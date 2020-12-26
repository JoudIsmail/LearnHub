// variables 
const title = document.getElementById('title'); 
const summary = document.getElementById('summary'); 
const edContent = document.getElementById('edContent'); 
const suitableFor = document.getElementById('suitableFor'); 
const instructorName = document.getElementById('instructorName'); 
const instructorContact = document.getElementById('instructorContact'); 
const courseImageAlt = document.getElementById('courseImageAlt'); 
const euroPicker = document.getElementById('europicker');
const centPicker = document.getElementById('centpicker');
const materialContent = document.getElementById('materialContent'); 

// Span Variables
const spanTitle = document.getElementById('spanTitle');
const spanSummary = document.getElementById('spanSummary');
const spanEdContent = document.getElementById('spanEdContant');
const spanSuitableFor = document.getElementById('spanSuitableFor');
const spanInstructorName = document.getElementById('spanInstructorName');
const spanInstructorContact = document.getElementById('spanInstructorContact');
const spanCourseImageAlt = document.getElementById('spanCourseImageAlt');
const spanEuroPicker = document.getElementById('spanEuroPicker');
const spanCentPicker = document.getElementById('spanCentPicker');
const spanMaterialContent = document.getElementById('spanMaterialContent');
const spanCourseImage = document.getElementById('spanCourseImage');
const spanInstructorImage = document.getElementById('spanInstructorImage');

//event listeners

title.addEventListener('keyup', function(){
    if(isInputEmpty(title)){
        invalidMessages(true, false, spanTitle, 70);
        checkValidity();

    }else if(!isThisCorrect2(title)){
        invalidMessages(false, true, spanTitle, 70 );
        checkValidity();

    }else{
        invalidMessages(false, false, spanTitle, 70 );
        checkValidity();
    }
});

euroPicker.addEventListener('keyup', function(){
    if(isInputEmpty(euroPicker)){
        invalidMessages(true, false, spanEuroPicker, 0);
        checkValidity();

    }else{
        invalidMessages(false, false, spanEuroPicker, 0 );
        checkValidity();
    }
});

centPicker.addEventListener('keyup', function(){
    if(isInputEmpty(centPicker)){
        invalidMessages(true, false, spanCentPicker, 0);
        checkValidity();

    }else{
        invalidMessages(false, false, spanCentPicker, 0 );
        checkValidity();
    }
});

courseImageAlt.addEventListener('keyup', function(){
    if(isInputEmpty(courseImageAlt)){
        invalidMessages(true, false, spanCourseImageAlt, 70);
        checkValidity();

    }else if(!isThisCorrect2(courseImageAlt)){
        invalidMessages(false, true, spanCourseImageAlt, 70 );
        checkValidity();

    }else{
        invalidMessages(false, false, spanCourseImageAlt, 70 );
        checkValidity();
    }
});

summary.addEventListener('keyup', function(){
    if(isInputEmpty(summary)){
        invalidMessages(true, false, spanSummary, 500);
        checkValidity();

    }else if(!isSummaryCorrect(summary)){
        invalidMessages(false, true, spanSummary, 500);
        checkValidity();

    }else{
        invalidMessages(false, false, spanSummary, 500);
        checkValidity();
    }
});

edContent.addEventListener('keyup', function(){
    if(isInputEmpty(edContent)){
        invalidMessages(true, false, spanEdContent, 300);
        checkValidity();

    }else if(!isThisCorrect(edContent)){
        invalidMessages(false, true, spanEdContent, 300);
        checkValidity();

    }else{
        invalidMessages(false, false, spanEdContent, 300);
        checkValidity();
    }
});

suitableFor.addEventListener('keyup', function(){
    if(isInputEmpty(suitableFor)){
        invalidMessages(true, false, spanSuitableFor, 300);
        checkValidity();

    }else if(!isThisCorrect(suitableFor)){
        invalidMessages(false, true, spanSuitableFor, 300);
        checkValidity();

    }else{
        invalidMessages(false, false, spanSuitableFor, 300);
        checkValidity();
    }
});

materialContent.addEventListener('keyup', function(){
    if(isInputEmpty(materialContent)){
        invalidMessages(true, false, spanMaterialContent, 300);
        checkValidity();

    }else if(!isThisCorrect(materialContent)){
        invalidMessages(false, true, spanMaterialContent, 300);
        checkValidity();

    }else{
        invalidMessages(false, false, spanMaterialContent, 300);
        checkValidity();
    }
});

instructorName.addEventListener('keyup', function(){
    if(isInputEmpty(instructorName)){
        invalidMessages(true, false, spanInstructorName, 30);
        checkValidity();

    }else if(!isInstructorNameCorrect(instructorName)){
        invalidMessages(false, true, spanInstructorName, 30);
        checkValidity();

    }else{
        invalidMessages(false, false, spanInstructorName, 30);
        checkValidity();
    }
});

instructorContact.addEventListener('keyup', function(){
    if(isInputEmpty(instructorContact)){
        invalidMessages(true, false, spanInstructorContact, 100);
        checkValidity();

    }else if(!isInstructorContactCorrect(instructorContact)){
        invalidMessages(false, true, spanInstructorContact, 100);
        checkValidity();

    }else{
        invalidMessages(false, false, spanInstructorContact, 100);
        checkValidity();
    }
});
// Display Invalid Message
function invalidMessages(empty, invalid, spanName, num){
    if(empty){
        spanName.textContent = "* Bitte alle Pflichtfelder ausfüllen";
        spanName.style.display= 'block';
        spanName.style.color = 'red';
        spanName.style.fontSize = '18px';
    }else if(invalid){
        spanName.textContent = "Maximal "+num+" Buchstaben";
        spanName.style.display= 'block';
        spanName.style.color = 'red';
        spanName.style.fontSize = '18px';
    }else{
        spanName.style.display = 'none';
    }
}

// Button
const create = document.getElementById('create');

// Images
const instructorImage = document.getElementById('instructorImage');
const courseImage = document.getElementById('courseImage');

/* Core Functions */

//check if input is Empty
function isInputEmpty(input){
    if(input.value.length === 0){
        return true;
    }
    return false;
}

function checkButton(button){
    if(button == true){
        create.disabled = true;
    }else if(button == false){
        create.disabled = false;
    }
}

/* 
    
    _____        ___   ___                  ___                     __  
   / ___/ ___   / _/  / _/ ___  ___        / _ )  ____ ___  ___ _  / /__
  / /__  / _ \ / _/  / _/ / -_)/ -_)      / _  | / __// -_)/ _ `/ /  '_/
  \___/  \___//_/   /_/   \__/ \__/      /____/ /_/   \__/ \_,_/ /_/\_\ 
                                                                        

                              )  (  (
                              (   ) )
                               ) ( (
                              _______)_
                           .-'---------|  
                          ( C|/\/\/\/\/|
                           '-./\/\/\/\/|
                             '_________'
                              '-------'
 */

/* Inputs Validation */

function isSummaryCorrect(input){
    var validRegex = new RegExp('^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿßæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸßÆŒ]{1,500}$');
    if(validRegex.test(input.value)){
        return true;
    }
    return false;
}

function isThisCorrect(input){
    var validRegex = new RegExp('^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿßæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸßÆŒ]{1,300}$'); 
    if(validRegex.test(input.value)){
        return true;
    }
    return false;
}

function isInstructorNameCorrect(input){
    var validRegex = new RegExp('^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿßæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸßÆŒ]{1,30}$');
    if(validRegex.test(input.value)){
        return true;
    }
    return false;
}

function isInstructorContactCorrect(input){
    var validRegex = new RegExp('^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿßæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸßÆŒ]{1,100}$');
    if(validRegex.test(input.value)){
        return true;
    }
    return false;
}

function isThisCorrect2(input){
    var validRegex = new RegExp('^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿßæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸßÆŒ]{1,70}$'); 
    if(validRegex.test(input.value)){
        return true;
    }
    return false;
}

// check if image was uploaded
function isImageCorrect(image){
    var path = image.getAttribute("src");
    var str = path.substring(path.lastIndexOf('/')+1);
    if(str === "noimage.png"){
        return false;
    }
    return true;
}

// check validity to disable button
function checkValidity(){
    if((isInputEmpty(title)) || (isInputEmpty(summary)) || (isInputEmpty(edContent)) || (isInputEmpty(suitableFor)) || (isInputEmpty(instructorName)) || (isInputEmpty(instructorContact)) || (isInputEmpty(courseImageAlt)) || (isInputEmpty(euroPicker)) || (isInputEmpty(centPicker)) || (isInputEmpty(materialContent))){
        checkButton(true);
    }else if((!isThisCorrect2(title)) || (!isThisCorrect2(courseImageAlt)) || (!isThisCorrect(edContent)) || (!isThisCorrect(suitableFor)) || (!isThisCorrect(materialContent)) || (!isSummaryCorrect(summary)) || (!isInstructorNameCorrect(instructorName))|| (!isInstructorContactCorrect(instructorContact))){
        checkButton(true);
    }else if((!isImageCorrect(instructorImage)) || (!isImageCorrect(courseImage))){
        checkButton(true);
    }else{
        checkButton(false);
    }
}

// display uploaded Course Image
var loadCourseImage = function(event){
    courseImage.src = URL.createObjectURL(event.target.files[0]);
}

//display uploaded Instructor Image
var loadInstructorImage = function(event){
    instructorImage.src = URL.createObjectURL(event.target.files[0]);
}

// disable button on load page
const body = document.querySelector('body');
body.onload = checkValidity();

