class MenuJs
{
    menu(route)
    {
        fetch(route)
        .then((resp) => resp.text())
        .then(function(data)
        {
            $('#content').html(data);
        })
        .catch(function(error) {
          console.log(error);
        }); 
    }

    closeSession()
    {
        fetch('loginController/closeSession')
        .then((resp) => resp.json())
        .then(function(data)
        {
            toastr.success(data.message);

            setTimeout(function()
            {
                location.href="index.php";
            }, 3000);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
}

var Menu=new MenuJs();