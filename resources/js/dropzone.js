class Dropzone {
    constructor(dropzoneGroup) {
        this.dropzone = dropzoneGroup.querySelector('.form-dropzone');
        this.inputElement = dropzoneGroup.querySelector('.form-dropzone-input');
        this.fileList = dropzoneGroup.querySelector('.form-dropzone-list');
        this.dataTransfer = new DataTransfer();

        // Bind event listeners
        this.bindEvents();
    }

    bindEvents() {
        // Handle drag and drop
        this.dropzone.addEventListener('dragover', (e) => this.handleDragOver(e));
        this.dropzone.addEventListener('dragleave', (e) => this.handleDragLeave(e));
        this.dropzone.addEventListener('drop', (e) => this.handleDrop(e));

        // Handle click to open file input
        this.dropzone.addEventListener('click', () => this.inputElement.click());

        // Handle file input change
        this.inputElement.addEventListener('change', (e) => this.handleFiles(e.target.files));
    }

    handleDragOver(e) {
        e.preventDefault();
        this.dropzone.classList.add('dragging');
    }

    handleDragLeave(e) {
        e.preventDefault();
        this.dropzone.classList.remove('dragging');
    }

    handleDrop(e) {
        e.preventDefault();
        this.dropzone.classList.remove('dragging');
        this.handleFiles(e.dataTransfer.files);
    }

    handleFiles(files) {
        Array.from(files).forEach(file => {
            this.dataTransfer.items.add(file); // Add files to DataTransfer
        });
        this.updateInputFiles();
        this.renderFileList();
    }

    renderFileList() {
        this.fileList.innerHTML = '';

        Array.from(this.dataTransfer.files).forEach((file, index) => {
            const li = document.createElement('li');
            li.innerHTML = `
                <span>${file.name}</span>
                <a role="button" class="btn btn-transparent btn-sm btn-icon btn-remove" data-index="${index}">
                    <i class="fa fa-trash"></i>
                </a>
            `;
            this.fileList.appendChild(li);
        });

        // Add remove functionality to each remove button
        Array.from(this.fileList.querySelectorAll('.btn-remove')).forEach(btn => {
            btn.addEventListener('click', (e) => {
                const index = btn.dataset.index;
                this.removeFile(index);
            });
        });

        if (this.dataTransfer.files.length === 0) {
            this.fileList.innerText = 'Noch keine Dateien ausgewählt'
        }
    }

    removeFile(index) {
        this.dataTransfer.items.remove(index); // Remove the file from the DataTransfer
        this.updateInputFiles();
        this.renderFileList();
    }

    updateInputFiles() {
        this.inputElement.files = this.dataTransfer.files; // Update the input element's files
    }
}

// Initialize file upload drop zones
document.addEventListener('DOMContentLoaded', () => {
    // Find all drop zones and initialize Dropzone instances
    document.querySelectorAll('.form-dropzone-group').forEach(dropzoneGroup => {
        new Dropzone(dropzoneGroup);
    });
});
