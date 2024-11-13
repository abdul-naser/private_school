$(document).ready(function() {

// Count hall Space for every room 

    $(document).on('keyup', '.width, .height', function() {
        var $row = $(this).closest('tr');

        var x = Number($row.find(".width").val());
        var y = Number($row.find(".height").val());
        var result = x * y;
        var formattedResult = parseFloat(result.toFixed(2));

       $row.find('.hallSpace').val(formattedResult);
    });



    // في حالة كانت قاعة دراسية
    $(document).on('change', '.typeUse', function() {

        var $row = $(this).closest('tr');
        // Use $(this) to refer to the changed .typeUse element
        if($(this).val() !== 'قاعة دراسية') {
            // Find the .countStudents input in the same row or related area
            $(this).closest('tr').find('.countStudents').val("");
            $(this).closest('tr').find('.countStudents').prop('readonly', true);


        } else {
            // Optional: Reset or clear .countStudents if condition doesn't match
let hallSpace = Number($row.find('.hallSpace').val());
let countStudents = Math.ceil(hallSpace / 1.5);
            $(this).closest('tr').find('.countStudents').val(countStudents);
            $(this).closest('tr').find('.countStudents').prop('readonly', true);

        }
    //count all number students

        let sumStudent = 0;


        $('.countStudents').each(function() {
            sumStudent += Number($(this).val());
        });
        $('.countStudentsAll').val(sumStudent);

    });

 

    
// Count hall Space for outside

$(".heightOut,.wdithOut").on("keyup", function () {
    var heightOut = Number($('.heightOut').val());
    var widthOut = Number($('.wdithOut').val());
    var resultOut = heightOut * widthOut;
var formattedResultOut = parseFloat(resultOut.toFixed(2));
    $('.hallSpaceOut').val(formattedResultOut);
});

// Count hall Space for Games Area

$(".heightGame,.wdithGame").on("keyup", function () {
    var heightGame = Number($('.heightGame').val());
    var wdithGame = Number($('.wdithGame').val());
    var resultGame = heightGame * wdithGame;
var formattedResultGame = parseFloat(resultGame.toFixed(2));
    $('.hallSpaceGame').val(formattedResultGame);
});


// Count room all  قاعة دراسية

$(document).on('change', '.typeUse', function() {
    let classRoom = 0;

    // Iterate over all elements with the class 'typeUse'
    $('.typeUse').each(function() {
        // Check if the value of the current element is 'قاعة دراسية'
        if ($(this).val() === 'قاعة دراسية') {
            classRoom++;
        }
        
    });

    // Update the value of the input field with the class 'countClassRoom'
    $('.countClassRoom').val(classRoom);
});


//count wc 
$(document).on('change', '.wc', function() {
    updateWCCount();
});

$(document).on('click', '.removeRow1', function() {

    updateWCCount();
});

function updateWCCount() {
    let wc = 0;
    $('.wc').each(function() {
        if ($(this).val() === 'نعم') {
            wc++;
        }
    });
    $('.countWC').val(wc);
}




});


function toggleReasonField(context) {
    var selectElement;
    var notAcceptDiv;
    var textAccept;

    if (context === 'visit') {
        selectElement = document.getElementById('visitApprove');
        notAcceptDiv = document.querySelector('.notAcceptVisit');
        textAccept = document.querySelector('.textAccept');
    } else if (context === 'department') {
        selectElement = document.getElementById('departmentApprove');
        notAcceptDiv = document.querySelector('.notAcceptDepartment');
    }

    if (selectElement || notAcceptDiv) {
        if (selectElement.value === 'عدم الموافقة') {
            if (textAccept) textAccept.innerHTML = 'الأسباب الرئيسية لعدم الموافقة';

            notAcceptDiv.style.display = 'block';
        }
         else if (selectElement.value === 'الموافقة') {
            if (textAccept) textAccept.innerHTML = 'ملاحظات';
            notAcceptDiv.style.display = 'block';
        } else {
            notAcceptDiv.style.display = 'none';
        }
    }
}


  /*------------Function in dayOfWeek ------------------*/

  function displayDayOfWeek() {
    const datevisit = document.getElementById("datevisit"); 
    const selectedDate = new Date(datevisit.value);
    const options = {weekday : "long"};
    const dayOfWeek = selectedDate.toLocaleDateString("ar-SA", options);
    const dayOfWeekElement = document.getElementById("dayOfWeek");
    dayOfWeekElement.value = ` ${dayOfWeek}`;
}


// popup Form Chart
const chartViewBtn = document.querySelector("#chartView"),
closeBtn = document.querySelectorAll("#close"),
popupOuter = document.querySelector(".popup-outer"),
 tableBuildings = document.getElementById("detailsBuild");

chartViewBtn.addEventListener("click", () => {
    popupOuter.classList.add("show");
    document.getElementById("searchBuilding").style.display = "none";
   
    tableBuildings.style.display = "none";
    
});

closeBtn.forEach(cBtn => {
    cBtn.addEventListener("click" , ()=>{
        popupOuter.classList.remove("show");
        document.getElementById("searchBuilding").style.display = "block";

        tableBuildings.style.display = "flex";
    });
  });
  