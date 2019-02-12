$("#SignInForm").validate({
    rules:{
        Email:{
           required: true,
            email: true,
        },
        Password:{
            required: true,
        },
    }
});
