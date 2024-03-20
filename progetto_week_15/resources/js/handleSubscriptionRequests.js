document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".confirm-button").forEach((button) => {
        button.addEventListener("click", function () {
            const userId = this.getAttribute("data-user-id");
            const courseId = this.getAttribute("data-course-id");

            handleAdmit(userId, courseId);
        });
    });
    document.querySelectorAll(".reject-button").forEach((button) => {
        button.addEventListener("click", function () {
            const userId = this.getAttribute("data-user-id");
            const courseId = this.getAttribute("data-course-id");

            handleReject(userId, courseId);
        });
    });
    document.querySelectorAll(".revoke-button").forEach((button) => {
        button.addEventListener("click", function () {
            const userId = this.getAttribute("data-user-id");
            const courseId = this.getAttribute("data-course-id");

            handleRevoke(userId, courseId);
        });
    });

    document.querySelectorAll(".reconsider-button").forEach((button) => {
        button.addEventListener("click", function () {
            const userId = this.getAttribute("data-user-id");
            const courseId = this.getAttribute("data-course-id");

            handleReconsider(userId, courseId);
        });
    });
});

function handleAdmit(userId, courseId) {
    console.log(`${userId}, ${courseId}`);
    console.log("funzzz");
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    axios.defaults.headers.common["X-CSRF-TOKEN"] = csrfToken;
    axios
        .put(`/user/${userId}/course/${courseId}/admit`)
        .then((response) => {
            console.log(response);
            const status = response.data.status;
            const statusElement = document.getElementById(
                `user-status-${userId}`
            );
            if (statusElement) {
                switch (status) {
                    case "confirmed":
                        statusElement.innerHTML =
                            '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Accepted</span>';
                        break;
                    case "pending":
                        statusElement.innerHTML =
                            '<span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span>';
                        break;
                    case "cancelled":
                        statusElement.innerHTML =
                            '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Rejected</span>';
                        break;
                }
            }

            const users = response.data.users;
            const count = response.data.confirmed_user_count;
            const max = response.data.max_capacity;

            updateTable(courseId, users, count, max);
        })
        .catch((error) => {
            console.error(error);
        });
}

function handleReject(userId, courseId) {
    console.log(`${userId}, ${courseId}`);
    console.log("funzzz");
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    // Includi il token CSRF nell'intestazione della richiesta Axios
    axios.defaults.headers.common["X-CSRF-TOKEN"] = csrfToken;
    axios
        .put(`/user/${userId}/course/${courseId}/reject`)
        .then((response) => {
            const status = response.data.status;
            const statusElement = document.getElementById(
                `user-status-${userId}`
            );
            if (statusElement) {
                switch (status) {
                    case "confirmed":
                        statusElement.innerHTML =
                            '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Accepted</span>';
                        break;
                    case "pending":
                        statusElement.innerHTML =
                            '<span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span>';
                        break;
                    case "cancelled":
                        statusElement.innerHTML =
                            '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Rejected</span>';
                        break;
                }
            }

            const users = response.data.users;
            const count = response.data.confirmed_user_count;
            const max = response.data.max_capacity;

            updateTable(courseId, users, count, max);
        })
        .catch((error) => {
            console.error(error);
        });
}

function handleRevoke(userId, courseId) {
    console.log(`${userId}, ${courseId}`);
    console.log("funzzz");
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    // Includi il token CSRF nell'intestazione della richiesta Axios
    axios.defaults.headers.common["X-CSRF-TOKEN"] = csrfToken;
    axios
        .put(`/user/${userId}/course/${courseId}/revoke`)
        .then((response) => {
            const status = response.data.status;
            const statusElement = document.getElementById(
                `user-status-${userId}`
            );
            if (statusElement) {
                switch (status) {
                    case "confirmed":
                        statusElement.innerHTML =
                            '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Accepted</span>';
                        break;
                    case "pending":
                        statusElement.innerHTML =
                            '<span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span>';
                        break;
                    case "cancelled":
                        statusElement.innerHTML =
                            '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Rejected</span>';
                        break;
                }
            }

            const users = response.data.users;
            const count = response.data.confirmed_user_count;
            const max = response.data.max_capacity;
            updateTable(courseId, users, count, max);
        })
        .catch((error) => {
            console.error(error);
        });
}

function handleReconsider(userId, courseId) {
    console.log(`${userId}, ${courseId}`);
    console.log("funzzz");
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    // Includi il token CSRF nell'intestazione della richiesta Axios
    axios.defaults.headers.common["X-CSRF-TOKEN"] = csrfToken;
    axios
        .put(`/user/${userId}/course/${courseId}/reconsider`)
        .then((response) => {
            const status = response.data.status;
            const statusElement = document.getElementById(
                `user-status-${userId}`
            );
            if (statusElement) {
                switch (status) {
                    case "confirmed":
                        statusElement.innerHTML =
                            '<span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Accepted</span>';
                        break;
                    case "pending":
                        statusElement.innerHTML =
                            '<span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Pending</span>';
                        break;
                    case "cancelled":
                        statusElement.innerHTML =
                            '<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Rejected</span>';
                        break;
                }
            }

            const users = response.data.users;
            const count = response.data.confirmed_user_count;
            const max = response.data.max_capacity;
            updateTable(courseId, users, count, max);
        })
        .catch((error) => {
            console.error(error);
        });
}

function updateTable(courseId, users, count, max) {
    const tableContainer = document.querySelector(
        "#table-container-" + courseId
    );

    const table = document.createElement("table");
    table.className =
        "w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400";

    const thead = document.createElement("thead");
    thead.className = "text-xs text-black uppercase bg-purple-400";
    const headerRow = document.createElement("tr");
    headerRow.className = "text-base";
    const headers = ["User", "Status", "Actions"];
    headers.forEach(function (headerText) {
        const th = document.createElement("th");
        th.textContent = headerText;
        headerRow.appendChild(th);
    });
    thead.appendChild(headerRow);
    table.appendChild(thead);

    const tbody = document.createElement("tbody");
    tbody.className = "text-black bg-purple-100";
    users.forEach(function (user) {
        const tr = document.createElement("tr");
        tr.className =
            "hover:bg-opacity-90 text-base border-b border-purple-400";

        const nameCell = document.createElement("td");
        nameCell.className = "px-5 py-5 text-sm";
        const nameLink = document.createElement("a");
        nameLink.href = "#";
        nameLink.innerHTML = `<div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10 overflow-hidden">
                                    <img class="w-full h-full rounded-full overflow-hidden"
                                        src="${user.profile_image}" alt="${user.name}" />
                                </div>
                                <div class="ml-3">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                    ${user.name}
                                    </p>
                                </div>
                              </div>`;

        nameCell.appendChild(nameLink);
        tr.appendChild(nameCell);

        const statusCell = document.createElement("td");
        statusCell.className = "px-6 py-4 text-sm text-center";
        const statusSpan = document.createElement("span");
        statusSpan.textContent = user.status;

        switch (user.status) {
            case "confirmed":
                statusSpan.className =
                    "bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300";
                break;
            case "pending":
                statusSpan.className =
                    "bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300";
                break;
            case "cancelled":
                statusSpan.className =
                    "bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300";
                break;
        }
        statusCell.appendChild(statusSpan);
        tr.appendChild(statusCell);

        const actionsCell = document.createElement("td");
        actionsCell.className = "px-6 py-4 text-sm text-center";
        if (count < max) {
            if (user.status === "pending") {
                const confirmButton = document.createElement("button");
                confirmButton.type = "button";
                confirmButton.className =
                    "text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2";
                confirmButton.textContent = "Confirm";
                confirmButton.addEventListener("click", function () {
                    handleAdmit(user.id, courseId);
                });
                actionsCell.appendChild(confirmButton);

                const rejectButton = document.createElement("button");
                rejectButton.type = "button";
                rejectButton.className = "text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2";
                rejectButton.textContent = "Reject";
                rejectButton.addEventListener("click", function () {
                    handleReject(user.id, courseId);
                });
                actionsCell.appendChild(rejectButton);
            } else if (user.status === "confirmed") {
                let revokeButton = document.createElement("button");
                revokeButton.type = "button";
                revokeButton.className =
                    "revoke-btn";
                revokeButton.textContent = "Revoke";
                revokeButton.addEventListener("click", function () {
                    handleRevoke(user.id, courseId);
                });
                actionsCell.appendChild(revokeButton);
            } else if (user.status === "cancelled") {
                let reconsiderButton = document.createElement("button");
                reconsiderButton.type = "button";
                reconsiderButton.className = "reconsider-btn";
                reconsiderButton.textContent = "Reconsider";
                reconsiderButton.addEventListener("click", function () {
                    handleReconsider(user.id, courseId);
                });
                actionsCell.appendChild(reconsiderButton);
            }
        } else {
            if (user.status === "pending") {
                let maxReachedMsg = document.createElement("p");
                maxReachedMsg.innerText = "MAX CAPACITY REACHED";
                actionsCell.appendChild(maxReachedMsg);
            } else if (user.status === "confirmed") {
                let revokeButton = document.createElement("button");
                revokeButton.type = "button";
                revokeButton.className =
                "revoke-btn";
                revokeButton.textContent = "Revoke";
                revokeButton.addEventListener("click", function () {
                    handleRevoke(user.id, courseId);
                });
                actionsCell.appendChild(revokeButton);
            }
        }

        tr.appendChild(actionsCell);

        tbody.appendChild(tr);
    });
    table.appendChild(tbody);

    tableContainer.innerHTML = "";
    tableContainer.appendChild(table);

    tableContainer.parentElement.previousElementSibling.children[0].children[5].children[0].innerText = `${count}/${max}`;
}
