const searchAllPastCourse = document.querySelector('#search-all-past-course');
const allPastCoursesRows = document.querySelectorAll('#all-past-courses-table tbody tr');
const searchAllPastCourseForm = searchAllPastCourse.parentElement;

searchAllPastCourseForm.addEventListener('submit', (e) => {
    e.preventDefault();
})

searchAllPastCourse.addEventListener('input', (e) => {
    e.preventDefault();
    const searchTerm = searchAllPastCourse.value.trim().toLowerCase(); // Ottenere il valore di ricerca e rimuovere spazi bianchi iniziali/finali

    allPastCoursesRows.forEach(row => {
        const courseName = row.textContent.trim().toLowerCase(); // Ottenere il nome del corso e rimuovere spazi bianchi iniziali/finali

        if (courseName.includes(searchTerm)) {
            row.classList.remove('hidden')
        } else {
            row.classList.add('hidden')
        }
    });
});