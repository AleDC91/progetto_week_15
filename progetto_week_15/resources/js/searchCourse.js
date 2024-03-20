const searchCourse = document.querySelector('#search-course');
const coursesRows = document.querySelectorAll('#my-courses-table tbody tr');
const searchCourseForm = searchCourse.parentElement;

searchCourseForm.addEventListener('submit', (e) => {
    e.preventDefault();
})

searchCourse.addEventListener('input', (e) => {
    e.preventDefault();
    const searchTerm = searchCourse.value.trim().toLowerCase(); // Ottenere il valore di ricerca e rimuovere spazi bianchi iniziali/finali

    coursesRows.forEach(row => {
        const courseName = row.textContent.trim().toLowerCase(); // Ottenere il nome del corso e rimuovere spazi bianchi iniziali/finali

        if (courseName.includes(searchTerm)) {
            row.classList.remove('hidden')
        } else {
            row.classList.add('hidden')
        }
    });
});