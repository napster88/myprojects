<!doctype html>
<html>
  <head>
  
  <style>
  
  iframe {
  width: 100%;
  border: 0;
  min-height: 80%;
  height: 600px;
  display: flex;
}
  
  </style>
    <title>Gmail API demo</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <style>
      .hidden{ display: none; }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Gmail API demo</h1>

      <button id="authorize-button" class="btn btn-primary hidden">Authorize</button>

      <table class="table table-striped table-inbox hidden">
        <thead>
          <tr>
            <th>From</th>
            <th>Subject</th>
            <th>Date/Time</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript">
       var clientId = '276924124683-0fbic26gfknq7o4bhpl43ugbuj770fps.apps.googleusercontent.com';
      var apiKey = 'AIzaSyA9gqghsKapxjdfd5e7WAVen3zFwi3W5oI';
      var scopes = 'https://www.googleapis.com/auth/gmail.readonly';
    </script>

    <script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
  </body>
</html>

<script>
function handleClientLoad() {
  gapi.client.setApiKey(apiKey);
  window.setTimeout(checkAuth, 1);
}

function checkAuth() {
  gapi.auth.authorize({
    client_id: clientId,
    scope: scopes,
    immediate: true
  }, handleAuthResult);
}

function handleAuthClick() {
  gapi.auth.authorize({
    client_id: clientId,
    scope: scopes,
    immediate: false
  }, handleAuthResult);
  return false;
}

function handleAuthResult(authResult) {
  if(authResult && !authResult.error) {
    loadGmailApi();
    $('#authorize-button').remove();
    $('.table-inbox').removeClass("hidden");
  } else {
    $('#authorize-button').removeClass("hidden");
    $('#authorize-button').on('click', function(){
      handleAuthClick();
    });
  }
}

function loadGmailApi() {
  gapi.client.load('gmail', 'v1', displayInbox);
}


function displayInbox() {
	
	console.log(gapi);
	
	var user_detail = gapi.client.gmail.users.getProfile ({
	
    'userId': 'me',
   
});
 user_detail.execute(function(response) {
	  console.log(response);
 });
	
	
	
  var request = gapi.client.gmail.users.messages.list({
    'userId': 'me',
    'labelIds': 'INBOX',
    'maxResults': 10
  });

  request.execute(function(response) {
    $.each(response.messages, function() {
      var messageRequest = gapi.client.gmail.users.messages.get({
        'userId': 'me',
        'id': this.id
      });
console.log(gapi);
     // messageRequest.execute(appendMessageRow);
    });
  });
}


/* function appendMessageRow(message) {
  $('.table-inbox tbody').append(
    '<tr>\
      <td>'+getHeader(message.payload.headers, 'From')+'</td>\
      <td>'+getHeader(message.payload.headers, 'Subject')+'</td>\
      <td>'+getHeader(message.payload.headers, 'Date')+'</td>\
    </tr>'
  );
}

function appendMessageRow(message) {
  $('.table-inbox tbody').append(
    '<tr>\
      <td>'+getHeader(message.payload.headers, 'From')+'</td>\
      <td>\
        <a href="#message-modal-' + message.id +
          '" data-toggle="modal" id="message-link-' + message.id+'">' +
          getHeader(message.payload.headers, 'Subject') +
        '</a>\
      </td>\
      <td>'+getHeader(message.payload.headers, 'Date')+'</td>\
    </tr>'
  );
}

$('body').append(
  '<div class="modal fade" id="message-modal-' + message.id +
      '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">\
    <div class="modal-dialog modal-lg">\
      <div class="modal-content">\
        <div class="modal-header">\
          <button type="button"\
                  class="close"\
                  data-dismiss="modal"\
                  aria-label="Close">\
            <span aria-hidden="true">&times;</span></button>\
          <h4 class="modal-title" id="myModalLabel">' +
            getHeader(message.payload.headers, 'Subject') +
          '</h4>\
        </div>\
        <div class="modal-body">\
          <iframe id="message-iframe-'+message.id+'" srcdoc="<p>Loading...</p>">\
          </iframe>\
        </div>\
      </div>\
    </div>\
  </div>'
);

$('#message-link-'+message.id).on('click', function(){
  var ifrm = $('#message-iframe-'+message.id)[0].contentWindow.document;
  $('body', ifrm).html(getBody(message.payload));
}); */



</script>