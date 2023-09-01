 // Add your JavaScript code here
 let courses = [];
 let coursesTable = document.querySelector("#courses tbody");
 let completedCredits = document.querySelector("#completed-credits");
 let gpa = document.querySelector("#gpa");
 let attCredit = document.querySelector("#attempted-credits");
 function updateTable() {
     // Clear table
     coursesTable.innerHTML = "";
     // Add rows
     for (let i = 0; i<courses.length; i++) {
         let course = courses[i];
         let row = coursesTable.insertRow(-1);
         // Course name input field
         let nameCell = row.insertCell(-1);
         let nameInput = document.createElement("input");
         nameInput.type = "text";
         nameInput.className = "form-control w-auto border-1 border-primary";
         nameInput.value = course.name;
         nameInput.addEventListener("input", function() {
             course.name = this.value;
         });
         nameCell.appendChild(nameInput);
         // Grade drop-down menu
         let gradeCell = row.insertCell(-1);
         let gradeSelect = document.createElement("select");
         gradeSelect.className = "form-select w-auto border-1 border-primary";
         gradeSelect.innerHTML = `
             <option value="4.0" ${course.grade == 4.0 ? "selected" : ""} class="fw-bolder">A+</option>
             <option value="4.0" ${course.grade == 3.8 ? "selected" : ""} class="fw-bolder">A</option>
             <option value="3.7" ${course.grade == 3.5 ? "selected" : ""} class="fw-bolder">A-</option>
             <option value="3.3" ${course.grade == 3.0 ? "selected" : ""} class="fw-bolder">B+</option>
             <option value="3.0" ${course.grade == 2.8 ? "selected" : ""} class="fw-bolder">B</option>
             <option value="2.7" ${course.grade == 2.5 ? "selected" : ""} class="fw-bolder">B-</option>
             <option value="2.3" ${course.grade == 2.0 ? "selected" : ""} class="fw-bolder">C+</option>
             <option value="2.0" ${course.grade == 1.8 ? "selected" : ""} class="fw-bolder">C</option>
             <option value="1.7" ${course.grade == 1.5 ? "selected" : ""} class="fw-bolder">C-</option>
             <option value="1.3" ${course.grade == 1.3 ? "selected" : ""} class="fw-bolder">D+</option>
             <option value="1.0" ${course.grade == 1.0 ? "selected" : ""} class="fw-bolder">D</option>
             <option value="0.0" ${course.grade == 0.0 ? "selected" : ""} class="fw-bolder">F</option>
         `;
         gradeSelect.addEventListener("change", function() {
             course.grade = parseFloat(this.value);
             updateGPA();
         });
         gradeCell.appendChild(gradeSelect);

         // Credit drop-down menu
         let creditCell = row.insertCell(-1);
         let creditSelect = document.createElement("select");
         creditSelect.className = "form-select w-auto border-1 border-primary";
         creditSelect.innerHTML = `
             <option value="1" ${course.credit == 1 ? "selected" : ""} class="fw-bolder">1</option>
             <option value="2" ${course.credit == 2 ? "selected" : ""} class="fw-bolder">2</option>
             <option value="3" ${course.credit == 3 ? "selected" : ""} class="fw-bolder">3</option>
             <option value="4" ${course.credit == 4 ? "selected" : ""} class="fw-bolder">4</option>
         `;
         creditSelect.addEventListener("change", function() {
             course.credit = parseInt(this.value);
             updateGPA();
             updateAttemptedCredits(); 
         });
         creditCell.appendChild(creditSelect);

         // Delete button
         let deleteCell = row.insertCell(-1);
         let deleteButton = document.createElement("button");
         deleteButton.className = "btn btn-danger";
         deleteButton.innerHTML = "Delete";
         deleteButton.addEventListener("click", function() {
             courses.splice(i, 1);
             updateTable();
         });
         deleteCell.appendChild(deleteButton);
     }

     // Update completed credits and GPA
     updateGPA();
     updateAttemptedCredits();
 }
function updateGPA() {
    let attemptedCredits = 0;
    let totalCredits = 0;
    let totalGradePoints = 0;
    for (let course of courses) {
        attemptedCredits += course.credit;
        totalGradePoints += course.grade * course.credit;
        if (course.grade !== 0.0) { // Only count courses with a grade other than F
            totalCredits += course.credit;
        }
    }
    attCredit.innerHTML = attemptedCredits;
    completedCredits.innerHTML = totalCredits;
    gpa.innerHTML = (totalGradePoints / attemptedCredits).toFixed(2);
}


function updateAttemptedCredits() {
    let attemptedCredits = 0;
    for (let course of courses) {
        attemptedCredits += course.credit;
    }
    // Update the element that displays the attempted credits
    // Replace "attempted-credits" with the ID of the element that displays the attempted credits
    attCredit.innerHTML = attemptedCredits;
}



 updateTable();

 // Handle add button click
 let addButton = document.querySelector("#add-button");
 addButton.addEventListener("click", function() {
     // Add new course
     courses.push({name: "", grade: 4.0, credit: 1});

     // Update table
     updateTable();
 });