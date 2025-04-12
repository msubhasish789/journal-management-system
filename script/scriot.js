function recruitReviewer(manuscriptId) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response from assign_reviewer.php, if needed
            alert(xhr.responseText);
        }
    };
    xhr.open("GET", "assign_reviewer.php?manuscriptId=" + manuscriptId, true);
    xhr.send();
}

function viewManuscript(manuscriptId) {
    // Open a new window or tab to view_manuscript.php
    window.open('view_manuscript.php?manuscriptId=' + manuscriptId, '_blank');
}

function openPopup() {
    // Display the overlay and popup
    document.getElementById('overlay').style.display = 'block';
}

function closePopup() {
    // Hide the overlay and popup
    document.getElementById('overlay').style.display = 'none';
}


function updateStatus(isChecked,  reviewer_id) {
    // Update the display status
    const statusElement = document.getElementsByClassName('switch');
    statusElement.textContent = isChecked ? 'ON' : 'OFF';

    // Send the status to the database (replace with your logic)
    // Here, you can use AJAX to send the status to a PHP script for database update
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response from assign_reviewer.php, if needed
            alert(xhr.responseText);
        }
    };
    
    if (isChecked) {
     //    Code to send "ON" status to the database
        xhr.open("GET", "reviewer_status_update.php?status=1&reviewer_id="+ reviewer_id, true);
        xhr.send();
       
        console.log('Sending "ON" status to the database');
    } else {
        // Code to send "OFF" status to the database
       xhr.open("GET", "reviewer_status_update.php?status=0&reviewer_id="+ reviewer_id, true);
       xhr.send();
        console.log('Sending "OFF" status to the database');
    }
}

function getReviewerStatus() {
    fetch('get_reviewer_status.php')
        .then(response => response.json())
        .then(data => {
            // Update the toggle button based on the fetched status
            const toggleButton = document.getElementById('reviewerToggle');
            toggleButton.checked = data.status === 1; // Assuming 1 is the active status
        })
        .catch(error => {
            console.error('Error fetching reviewer status:', error);
        });
}

//var currentPage = window.location.href; // assuming full URL
     var currentPage = window.location.pathname; // if you want just the path

    // Set the active class based on the current page
    if (currentPage.includes("pending_review.php")) {
        document.getElementById("Review").style.color = "#63ea75";
    } else if (currentPage.includes("review_request_list.php")) {
        document.getElementById("Request").style.color = "#63ea75";
    }
    else if (currentPage.includes("submitted_review_list.php")) {
        document.getElementById("Submitted").style.color = "#63ea75";
    }

    else if (currentPage.includes("pending%20list.php")) {
        document.getElementById("Pending").style.color = "#63ea75";
    }
    else if (currentPage.includes("editor_assigned.php")) {
        document.getElementById("Assigned").style.color = "#63ea75";
    }
    else if (currentPage.includes("editor_rejected.php")) {
        document.getElementById("Rejected").style.color = "#63ea75";
    }
