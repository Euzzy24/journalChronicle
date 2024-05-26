document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("#add-user").addEventListener("click", function(){
        document.querySelector(".add-pop").classList.add("active");
    });

    document.querySelector(".add-pop .close-btn").addEventListener("click", function(){
        document.querySelector(".add-pop").classList.remove("active");
    });
});

$(document).ready(function() {
    $('#profile_pic').change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#profile_pic_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });
});

// document.addEventListener("DOMContentLoaded", function() {
//     // document.querySelector(".edit-user").addEventListener("click", function(){
//     //     document.querySelector(".update-pop").classList.add("active");
//     // });

//     document.querySelector(".update-pop .close-btn").addEventListener("click", function(){
//         document.querySelector(".update-pop").classList.remove("active");
//     });
// });
function openEditUserModal(id){
    console.log(id)
    document.querySelector(`.user-${id}`).classList.add("active");

    // Add the file input change event handling logic here
    var input = document.getElementById(`edit_pic_${id}`);
    input.addEventListener('change', function() {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(`profile_preview_${id}`).setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            // If no file is selected, show the default profile picture
            document.getElementById(`profile_preview_${id}`).setAttribute('src', 'assets/images/profile.png');
        }
    });
}



function closeEditUserModal(id){
    document.querySelector(`.user-${id}`).classList.remove("active");
}

function openViewModal(id){
    document.querySelector(`.show_profile-${id}`).classList.add("active");
}

function hide_profile(id){
    document.querySelector(`.show_profile-${id}`).classList.remove("active");
}


//FOR AUTHOR
document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("#add-author").addEventListener("click", function(){
        document.querySelector(".add-auth").classList.add("active");
    });

    document.querySelector(".add-auth .close-btn").addEventListener("click", function(){
        document.querySelector(".add-auth").classList.remove("active");
    });
});


//TOGGLE
function toggleArchive(volumeid, isChecked) {
    var baseUrl = "<?php echo base_url('Volumes/toggle_archive/'); ?>";
    var url = baseUrl + volumeid + "/" + (isChecked ? 1 : 0); // Pass 1 if checked, 0 if unchecked
    console.log("Fetching URL:", url);
    fetch(url)
        .then(response => {
            if (!response.ok) {
                console.error("Server response status:", response.status);
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                console.log("Archive status updated successfully");
            } else {
                console.error("Failed to update archive status:", data.message);
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
}



//CHANGE LIST COLOR
document.addEventListener("DOMContentLoaded", function() {
    const links = document.querySelectorAll('.nav_admin a');

    function handleFocus(e) {
        e.target.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
        e.target.style.color = '#13305B';
    }

    function handleBlur(e) {
        e.target.style.backgroundColor = 'rgba(0, 0, 0, 0.5)'; // Fixed syntax error here
        e.target.style.color = '#fff';
    }

    links.forEach(link => {
        link.addEventListener('focus', handleFocus);
        link.addEventListener('blur', handleBlur);
    });
});
