function MyCustomUploadAdapterPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        return {
            upload() {
                return loader.file
                    .then(file => new Promise((resolve, reject) => {
                        // Prepare the form data.
                        let form_data = new FormData();
                        form_data.append('file', file);
                        axios.post(routeCkeditorUpoload, form_data, {
                            headers: {'Content-Type': 'multipart/form-data'}
                        }).then(response => {
                            resolve({
                                default: response.data
                            });
                        });
                    }));
            },
            // Aborts the upload process.
            abort() {
                console.log('Error upload')
            }
        };
    };
}

function initCK(myIdentifierHere,field) {
    ClassicEditor.create(myIdentifierHere, {
        extraPlugins: [MyCustomUploadAdapterPlugin],
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                'indent',
                'outdent',
                '|',
                'blockQuote',
                'imageUpload',
                'mediaEmbed',
                'undo',
                'redo'
            ]
        },
        language: 'pt-br',
        licenseKey: '',
    })
        .then(function (editor) {
            editor.model.document.on('change:data', () => {
                Livewire.emit('input', {
                    value: editor.getData(),
                    field: field
                })
            })
        })
        .catch(error => {
            console.error(error);
        });
}
