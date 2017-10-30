function displayAssignmentsList () { 
    var assignmentsArray = ["assignment 1", "assignment 2", "assignment 3"]; // setup array
    var assignmentsArrayFiles = ["assignment1", "assignment2", "assignment3"]; // setup array
    var listOfAssignments = ""; // setup/initialize string variable
    for (i=0; i < assignmentsArray.length; i++) { // loop through array elements
      // console.log(i); // debugging statements
      // console.log(assignmentsArray[i]); // debugging statements
      listOfAssignments = listOfAssignments + "<li><a href='" + assignmentsArrayFiles[i];        
      listOfAssignments = listOfAssignments + ".php'>" + assignmentsArray[i] + "</a></li>"; // build HTML
    }
    assignmentsList.innerHTML = listOfAssignments; // display HTML code on web page
  }