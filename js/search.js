// since there is no pagination, we can apply this simple/stupid appraoch

// check if searchbar is empty 
// if empty do nothing

// so basically whenever search function fires following happen
/* 1. reset classes
   2. check the input
   3. search the input
   4. if the input exists: 1. remove (columns) class and add (showThis) class to the result.
                           2. remove (columns) class and add (removeThis) class to rest.
   5. if the input doesn't exist, don't change anything in classes 
                       */


var search = function(event){
    // check if the class exists
    if(document.getElementsByClassName('showThis').length > 0){
        resetClasses();
    }
    if(!isInputEmpty(searchTerm)){
        if(isSearchValid(searchTerm)){
            hideClass();
        }
    }
}

// variables
var searchTerm = document.getElementById('search');
var course = document.querySelectorAll('a.p-420');
var num = course.length;

// check if input is empty
function isInputEmpty(input){
    if(input.value.length === 0){
        return true;
    }
    return false;
}

// check if there is result, if it does find any results change the class name 
function isSearchValid(search){
    var counter = 0;
    for( var i = 0; i < num; i++){
        if(document.getElementById(i).innerText.includes(search.value)){
            var input = i;
            changeClass(input);
            counter++;
        }
    }
    if(counter == 0){
        console.log('no matches found');
        return false;
    }
     return true;
}

// function to hide classes
function hideClass(){
    var hide = document.getElementsByClassName('columns');
    while(hide.length > 0){
        hide[0].className = 'removeThis column-66';
    }
}

// we can use this function to change/ reset classes
function changeClass(input){
    // since we have simple structure, we can simply use this lazy way /\bcolumns\b/g
    document.getElementById(input).parentElement.parentElement.parentElement.classList.remove('columns');
    document.getElementById(input).parentElement.parentElement.parentElement.classList.add('showThis');
}

// reset classes 
function resetClasses(){
    var reset = document.getElementsByClassName('showThis');
    var reset2 = document.getElementsByClassName('removeThis');
    while(reset.length > 0){
        reset[0].className = 'columns column-66';
    }
    while(reset2.length > 0){
        reset2[0].className = 'columns column-66';
    }
}



