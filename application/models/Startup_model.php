  <?php
  
  // query the data.qld.gov.au API (JavaScript)
  var data = {
    resource_id: '99f59524-db21-465a-8898-a9686b55deba', // the resource id
    limit: 5, // get 5 results
    q: 'jones' // query for 'jones'
  };
  $.ajax({
    url: 'https://data.qld.gov.au/api/action/datastore_search',
    data: data,
    dataType: 'jsonp',
    success: function(data) {
      alert('Total results found: ' + data.result.total)
    }
  });

  ?>
  