const searchPastCourse = document.querySelector('#search-past-course');
const pastCoursesRows = document.querySelectorAll('#my-past-courses-table tbody tr');
const searchPastCourseForm = searchPastCourse.parentElement;

searchPastCourseForm.addEventListener('submit', (e) => {
    e.preventDefault();
})

searchPastCourse.addEventListener('input', (e) => {
    e.preventDefault();
    const searchTerm = searchPastCourse.value.trim().toLowerCase(); // Ottenere il valore di ricerca e rimuovere spazi bianchi iniziali/finali

    pastCoursesRows.forEach(row => {
        const courseName = row.textContent.trim().toLowerCase(); // Ottenere il nome del corso e rimuovere spazi bianchi iniziali/finali

        if (courseName.includes(searchTerm)) {
            row.classList.remove('hidden')
        } else {
            row.classList.add('hidden')
        }
    });
});