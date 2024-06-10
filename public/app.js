document.addEventListener('DOMContentLoaded', function () {
    const editableFields = document.querySelectorAll('.editable');

    editableFields.forEach(field => {
        field.addEventListener('blur', function (e) {
            const courseId = this.dataset.courseId;
            const data = { value: this.innerText };
            const fieldName = this.dataset.field;

            fetch(`/update-course/${courseId}/${fieldName}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        });
    });
});
