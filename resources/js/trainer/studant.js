import $ from "jquery";

$(document).ready(function () {
    $(document).on("click", ".info-student-btn", function () {
        // Get course ID and student data from data attribute
         const studentData = $(this).data("studant-info");

        // Get course title from the row
        const courseTitle = $(this)
            .closest("tr")
            .find("td:nth-child(2)")
            .text()
            .trim();

        // Set course title in modal
        $("#course-title").text(courseTitle);

        // Show modal
        $("#studentsModal").removeClass("hidden");

        // Display students data without AJAX request
        displayStudentsData(studentData);
    });

    // Close modal when close button is clicked
    $(document).on("click", ".close-modal", function () {
        $("#studentsModal").addClass("hidden");
    });

    // Search functionality
    $("#student-search").on("input", function () {
        const searchTerm = $(this).val().toLowerCase();

        // إذا كان حقل البحث فارغًا، أظهر جميع الصفوف
        if (searchTerm === '') {
            $("#students-list tr:not(.empty-state)").show();
            return;
        }

        // تحقق من وجود أي تطابق
        let foundMatch = false;

        $("#students-list tr:not(.empty-state)").each(function () {
            // البحث في جميع الخلايا في الصف
            const rowText = $(this).text().toLowerCase();

            if (rowText.includes(searchTerm)) {
                $(this).show();
                foundMatch = true;
            } else {
                $(this).hide();
            }
        });

        // إظهار رسالة إذا لم يتم العثور على نتائج
        if (!foundMatch && $("#students-list tr:not(.empty-state)").length > 0) {
            // إذا لم تكن رسالة "لا توجد نتائج" موجودة بالفعل، أضفها
            if ($("#no-results-row").length === 0) {
                $("#students-list").append(`
                    <tr id="no-results-row" class="no-results">
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            <p>No results found for "${searchTerm}"</p>
                        </td>
                    </tr>
                `);
            }
        } else {
            // إزالة رسالة "لا توجد نتائج" إذا كانت موجودة
            $("#no-results-row").remove();
        }
    });

    // Function to display students data from data attribute
    function displayStudentsData(studentsData) {
        // Update last updated time
        $("#last-updated").text(`Last updated: ${new Date().toLocaleString()}`);

        // Parse students data if it's a string
        let students = studentsData;
        if (typeof studentsData === "string") {
            try {
                students = JSON.parse(studentsData);
            } catch (e) {
                console.error("Error parsing students data:", e);
                students = [];
            }
        }

        // Update students count
        $("#students-count").text(students.length);

        // If no students, show empty state
        if (students.length === 0) {
            $("#students-list").html(`
                <tr class="empty-state">
                    <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <p class="mt-2 text-sm">No students enrolled in this course yet</p>
                    </td>
                </tr>
            `);
            return;
        }

        // Populate students table
        let html = "";
        students.forEach((student) => {
            html += `
                <tr class="hover:bg-gray-50">

                    <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 ">
                                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=${encodeURIComponent(
                                    student.email
                                )}&background=random" alt="${student.email}">
                            </div>
                                  <div class="text-sm text-gray-900 px-2">${
                                      student.email
                                  }</div>
                        </div>

                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${new Date(
                            student.pivot.created_at
                        ).toLocaleDateString()}</div>
                    </td>

                </tr>
            `;
        });

        $("#students-list").html(html);
    }
});


