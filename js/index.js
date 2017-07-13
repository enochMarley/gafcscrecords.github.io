function getAllRecords(){
  $.ajax({
    method: 'GET',
    url: "includes/server_scripts/getAllRecords.php",
    success: function(response){
      $(".items-div").html(response);
    },
    error: function(error){
      alert(error.toString());
    }
  });
}

getAllRecords();

$(".search-input").on("input", function(){
  var searchTerm = $(".search-input").val();
  var sendDataObj = {};
  sendDataObj.searchTerm = searchTerm;
  var data = $.param(sendDataObj);
  if (!(searchTerm == "")) {
    $.ajax({
      method: 'POST',
      data: data,
      url: "includes/server_scripts/sendSearchTerm.php",
      success: function(response){
        getSearchResults();
      },
      error: function(error){
        console.log(error);
      }
    });
  }else{
    getAllRecords();
  }
});

function getSearchResults(){
  $.ajax({
    method: 'GET',
    url: "includes/server_scripts/getSearchResults.php",
    success: function(response){
      $(".items-div").html(response);
    },
    error: function(error){
      alert(error.toString());
    }
  });
}