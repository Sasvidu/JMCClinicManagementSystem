const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        
        console.log(entry);

        if(entry.isIntersecting){
            entry.target.classList.add('show');
        }else{
            //entry.target.classList.remove('show');
        }

    });
});

const hiddenElements = document.querySelectorAll('.hidden');
hiddenElements.forEach((element) => observer.observe(element));


function LoginAnimate(){
    loginIcon = document.getElementById('loginIcon');
    loginIcon.classList.remove('deAnimatedIconLogin');
    loginIcon.classList.add('animatedIconLogin');

    loginText = document.getElementById('loginText');
    loginText.classList.remove('deAnimatedText');
    loginText.classList.add('animatedText');
}

function LoginDeAnimate(){
    loginIcon = document.getElementById('loginIcon');
    loginIcon.classList.remove('AnimatedIconLogin');
    loginIcon.classList.add('deAnimatedIconLogin');

    loginText = document.getElementById('loginText');
    loginText.classList.remove('AnimatedText');
    loginText.classList.add('deAnimatedText');
}

function SignUpAnimate(){
    signupIcon = document.getElementById('signupIcon');
    signupIcon.classList.remove('deAnimatedIconSignUp');
    signupIcon.classList.add('animatedIconSignUp');

    signupText = document.getElementById('signupText');
    signupText.classList.remove('deAnimatedText');
    signupText.classList.add('animatedText');
}

function SignUpDeAnimate(){
    signupIcon = document.getElementById('signupIcon');
    signupIcon.classList.remove('AnimatedIconSignUp');
    signupIcon.classList.add('deAnimatedIconSignUp');

    signupText = document.getElementById('signupText');
    signupText.classList.remove('AnimatedText');
    signupText.classList.add('deAnimatedText');
}

