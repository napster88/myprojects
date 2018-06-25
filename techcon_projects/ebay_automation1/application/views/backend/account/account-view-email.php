<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$scope= urlencode('https://api.ebay.com/oauth/api_scope https://api.ebay.com/oauth/api_scope/sell.marketing.readonly https://api.ebay.com/oauth/api_scope/sell.marketing https://api.ebay.com/oauth/api_scope/sell.inventory.readonly https://api.ebay.com/oauth/api_scope/sell.inventory https://api.ebay.com/oauth/api_scope/sell.account.readonly https://api.ebay.com/oauth/api_scope/sell.account https://api.ebay.com/oauth/api_scope/sell.fulfillment.readonly https://api.ebay.com/oauth/api_scope/sell.fulfillment https://api.ebay.com/oauth/api_scope/sell.analytics.readonly');  ?><div class="content-wrapper" style="min-height: 916px;"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $head_title; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Plans</li>
        <li class="active"><?php echo $head_title; ?></li>
      </ol>
    </section>
	<input type="hidden" class="delete_url" value="<?php echo base_url('plans/hide'); ?>" />
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Plans list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
			  
			    <div class="container">
      <input id="authorize-button" type="button" class="btn btn-primary "value="Authorize"/>
<input type="text" class="email">
    

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
      var clientId = '276924124683-hh53hqen2bsvtkc3n3vshfjbbuoif0pj.apps.googleusercontent.com';
      var apiKey = 'AIzaSyA9gqghsKapxjdfd5e7WAVen3zFwi3W5oI';
      var scopes = 'https://www.googleapis.com/auth/gmail.readonly';
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
		 // hd:'https://techconlabs.net',
          immediate: false
        }, handleAuthResult);
        return false;
      }
      function handleAuthResult(authResult) {
	 // console.log(authResult);
		  console.log(authResult.access_token);
      //  if(authResult && !authResult.error) {
          loadGmailApi();
         // $('#authorize-button').remove();
          $('.table-inbox').removeClass("hidden");
      //  } else {
       //  $('#authorize-button').removeClass("hidden");
          $('#authorize-button').on('click', function(){
			  //alert();
            handleAuthClick();
          });
        //}
      }
      function loadGmailApi() {
       gapi.client.load('gmail', 'v1', displayInbox);
	  // console.log( gapi.client);
      }
      function displayInbox() {
		  
       var requestm = gapi.client.gmail.users.getProfile({
		   'userId': 'me',
		    });
 requestm.execute(function(responsem) {
	 //etrieve email id
	 $('.email').val(responsem.emailAddress);
	 console.log(responsem.emailAddress);
	 
	 
	/*  var url="<?php echo base_url('account/check_email_authrozition');?>";
	 $.ajax
	 ({
		 type:'POST',
		 url: url,
		 data:{ 'email':responsem.emailAddress},
		 success: function(data) {
       alert();
      }
		 
	 });  */
	  });
	   var request = gapi.client.gmail.users.messages.list({
          'userId': 'me',
          'labelIds': 'INBOX',
          'maxResults': 100
        });
		//console.log(request);
        request.execute(function(response) {
			//console.log(response);
          $.each(response.messages, function() {
			     var messageRequest = gapi.client.gmail.users.messages.get({
              'userId': 'me',
              'id': this.id
            });
            messageRequest.execute(appendMessageRow);
          });
        });
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
		  console.log(message.payload);
        });
      }
      function getHeader(headers, index) {
        var header = '';
        $.each(headers, function(){
          if(this.name === index){
            header = this.value;
          }
        });
        return header;
      }
      function getBody(message) {
        var encodedBody = '';
        if(typeof message.parts === 'undefined')
        {
          encodedBody = message.body.data;
        }
        else
        {
          encodedBody = getHTMLPart(message.parts);
        }
        encodedBody = encodedBody.replace(/-/g, '+').replace(/_/g, '/').replace(/\s/g, '');
        return decodeURIComponent(escape(window.atob(encodedBody)));
      }
      function getHTMLPart(arr) {
        for(var x = 0; x <= arr.length; x++)
        {
          if(typeof arr[x].parts === 'undefined')
          {
            if(arr[x].mimeType === 'text/html')
            {
              return arr[x].body.data;
            }
          }
          else
          {
            return getHTMLPart(arr[x].parts);
          }
        }
        return '';
      }
    </script>
    <script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
	 
	 
	 
				
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
			  
			  
			  
			  
			  
			  
            </div>
            <!-- /.box-body --> 
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
	  
	 	
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 