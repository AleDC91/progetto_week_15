const searchAllCourse = document.querySelector('#search-all-course');
const allCoursesRows = document.querySelectorAll('#all-courses-table tbody tr');
const searchAllCourseForm = searchAllCourse.parentElement;

searchAllCourseForm.addEventListener('submit', (e) => {
    e.preventDefault();
})

searchAllCourse.addEventListener('input', (e) => {
    e.preventDefault();
    const searchTerm = searchAllCourse.value.trim().toLowerCase(); // Ottenere il valore di ricerca e rimuovere spazi bianchi iniziali/finali

    allCoursesRows.forEach(row => {
        const courseName = row.textContent.trim().toLowerCase(); // Ottenere il nome del corso e rimuovere spazi bianchi iniziali/finali

        if (courseName.includes(searchTerm)) {
            row.classList.remove('hidden')
        } else {
            row.classList.add('hidden')
        }
    });
});