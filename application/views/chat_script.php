<!-- Chat HTML -->
<div id="chat_parent">
  <div id="chat_messages_parent">
    <div id="chat_messages_box">
      Loading...
    </div>
  </div>

  <?php if ($log_check) { ?>
  <div id="chat_input_parent">
    <form name="new_chat" id="new_chat" onsubmit="return chat_submit_function()">
      <input type="text" name="chat_input" class="form-control" id="chat_input" autocomplete="off" value="" placeholder="chat" />
      <!-- submit button positioned off screen -->
      <input name="submit_chat" type="submit" id="submit_chat" value="true" style="position: absolute; left: -9999px">
    </form>
  </div>
  <?php } ?>
</div>

<!-- Chat Script -->
<script>

  var world_key = <?php echo $world['id']; ?>;
  var last_message_id = 0;
  var at_bottom = true;

  // Detect if user is at bottom
  var text_to_bottom_css = true;
  $('#chat_messages_box').scroll(function() {
    at_bottom = false;
    if ($('#chat_messages_box').prop('scrollHeight') - $('#chat_messages_box').scrollTop() <= Math.ceil($('#chat_messages_box').height())) {
      at_bottom = true;
    }
  });

  //Chat Load
  function chat_load(inital_load) {
    $.ajax(
    {
        url: "<?=base_url()?>chat/load",
        type: "POST",
        data: {
          world_key: world_key,
          inital_load: inital_load,
          last_message_id: last_message_id
        },
        cache: false,
        success: function(response)
        {
          // Parse
          messages = JSON.parse(response);
          if (!messages) {
            return false;
          }

          // Loop through to create html
          html = '';
          $.each(messages, function(i, message) {
            // Skip if we already have this message, although we really shouldn't
            if (parseInt(message.id) <= parseInt(last_message_id)) {
              return true;
            }
            // Update latest message id
            last_message_id = message.id;
            html += '<div class="chat_message"><span class="glyphicon glyphicon-user" style="color: ' + message.color + '""></span>' ;
            html += message.username + ': ' + message.message + '</div>';
          });
        // Append to div
        html = convert_general_url(html)
        if (inital_load) {
          $("#chat_messages_box").html('');
        }
        $("#chat_messages_box").append(html);

        // Scrool to bottom
        if (at_bottom || inital_load) {
          $("#chat_messages_box").scrollTop($("#chat_messages_box")[0].scrollHeight);
        }
        }
    });
  }
  chat_load(true);

  // Chat Loop
  chat_interval = 3 * 1000;
  if (document.location.hostname == "localhost") {
    chat_interval = 10 * 1000;
  }
  setInterval(chat_load, chat_interval);

  // Called by form
  function chat_submit_function(e) {
    // Chat input
    var chat_input = $("#chat_input").val();
    $.ajax(
    {
        url: "<?=base_url()?>chat/new_chat",
        type: "POST",
        data: { 
          chat_input: chat_input,
          world_key: world_key
        },
        cache: false,
        success: function(html)
        {
          if (html) {
            alert(html);
          }
        }
    });

    $('#chat_input').val('');
    // Load log so user can instantly see his message
    chat_load();
    // Focus back on input
    $('#chat_input').focus();
    return false;
  }

  function convert_general_url(input) {
    // Ignore " to not conflict with other converts
    var pattern = /(?!.*")([-a-zA-Z0-9@:%_\+.~#?&//=;]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=;]*))/gi;
    if (pattern.test(input)) {
      var replacement = '<a href="$1" target="_blank" class="message_link message_content">$1</a>';
      var input = input.replace(pattern, replacement);
    }
    return input;
  }

</script>