// Register the plugin with FilePond
FilePond.registerPlugin(
    FilePondPluginFileMetadata, 
    FilePondPluginImageCrop,
    FilePondPluginImagePreview
);

// Get a reference to the file input element
const inputElement = document.querySelector('input[type="file"]');

// Create the FilePond instance
const pond = FilePond.create(inputElement, {
    imageCropAspectRatio: '1:1',
    labelIdle: `Arraste e solte seu logotipo ou então <span class="filepond--label-action">Busque Aqui</span>`,
    imagePreviewHeight: 300,
    imageResizeTargetWidth: 300,
    imageResizeTargetHeight: 300,
    stylePanelLayout: 'compact circle',
    styleLoadIndicatorPosition: 'center bottom',
    styleButtonRemoveItemPosition: 'center bottom',
    fileMetadataObject: {
        'markup': [
        ]
    }
});