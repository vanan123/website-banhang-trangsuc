  $(document).ready(function(){ 
        window.readURL = function(input)
        {
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e) 
        {
            $('#image1')
            .attr('src',e.target.result)
            .width(150)
            .height(100);
        };
        reader.readAsDataURL(input.files[0]);
    }
};
});
