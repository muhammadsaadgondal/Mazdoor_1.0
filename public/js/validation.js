patterns = {
    phoneNumber   : "/^[+]923[0-5][0-9][0-9]{7}$",
    name          : "/^[a-zA-Z ]+$/gi",
    password      : ["/[1-9]+","/[A-Z]+","/[a-z]+","/\\W+"],
    postalCode    : "/^[0-9]{5}$",
    cnic          : "/^[0-9]{5}-[0-9]{7}-[0-9]$"
}

function validate(field){
    if(patterns[field.name].test(field.value)){
        field.className = 'valid';
    }
    else{
        field.className = 'invalid';
    }
}

function validatePassword(field){
    
}