<script>
    function loadSchool() {
    $.ajax({
        url: 'schools_data/crud.php',
        type: 'GET',
        data: { getSchools: true },
        success: function(response) {
            let schools = JSON.parse(response);
            let html = '';
            schools.forEach((school, index) => {
                html += `<tr>
                    <td>${school.number}</td>
                    <td>${school.school_id}</td>
                    <td>${school.school_type}</td>
                    <td>${school.school_name}</td>
                    <td>${school.wilaya}</td>
                    <td>${school.location}</td>
                    <td>${school.school_status}</td>
                    <td>${school.phone}</td>
                    <td>${school.email}</td>
                    <td>${school.commercial_number}</td>
                    <td>${school.program_type}</td>
                    <td>${school.owner_bulding}</td>
                    <td>${school.celender}</td>
                    <td>${school.low_class}</td>
                    <td>${school.high_class}</td>
                    <td>${school.owner_school}</td>
                    <td>${school.owner_national}</td>
                    <td>${school.renew_date_approval}</td>
                    <td>${school.expired_date_approval}</td>
                    <td>${school.year_start}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" 
                            onclick="editSchool(
                               '${school.number}', '${school.school_id}', '${school.school_type}', '${school.school_name}', 
'${school.wilaya}', '${school.location}', '${school.school_status}', 
'${school.phone}', '${school.email}', '${school.commercial_number}', 
'${school.program_type}', '${school.owner_bulding}', '${school.celender}', 
'${school.low_class}', '${school.high_class}', '${school.owner_school}', 
'${school.owner_national}', '${school.renew_date_approval}', 
'${school.expired_date_approval}', '${school.year_start}'

                            )">
                            <ion-icon name="create-outline"></ion-icon>
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="deleteSchool(${school.number})">
                            <ion-icon name="trash-outline"></ion-icon>
                        </button>
                    </td>
                </tr>`;
            });
            $('#dataSchools').html(html);
        }
    });
}

// تعديل مستخدم
function editSchool(
    number, school_id, school_type, school_name, wilaya, location, school_status, 
phone, email, commercial_number, program_type, owner_bulding, celender, low_class, 
high_class, owner_school, owner_national, renew_date_approval, expired_date_approval, 
year_start
) {
    // Populate the form fields with the data received
    $('#noSchool').val(number);              // Matches `school.number`
$('#school_id').val(school_id);
$('#school_type').val(school_type);
$('#school_name').val(school_name);
$('#wilayat').val(wilaya);
$('#location').val(location);
$('#school_status').val(school_status);
$('#phone').val(phone);
$('#email').val(email);
$('#commercial_number').val(commercial_number);
$('#program_type').val(program_type);
$('#owner_bulding').val(owner_bulding);
$('#celender').val(celender);
$('#low_class').val(low_class);
$('#high_class').val(high_class);
$('#owner_school').val(owner_school);
$('#owner_national').val(owner_national);
$('#renew_date_approval').val(renew_date_approval);
$('#expired_date_approval').val(expired_date_approval);
$('#year_start').val(year_start);


    // Show the modal
    $('#dataSchoolModal').modal('show');
}
