document.getElementById('filter_post_id').addEventListener('change', function () {
    let postId = this.value || this.options[this.selectedIndex].value
    window.location.href = window.location.href.split('?')[0] + '?post_id=' + postId
})

document.querySelectorAll('.btn-delete').forEach((button) => {
    button.addEventListener('click', function (event) {
        event.preventDefault()
        if (confirm("Are you sure?")) {
            let action = this.getAttribute('href')
            let form = document.getElementById('form-delete')
            form.setAttribute('action', action)
            form.submit()
        }
    })
})