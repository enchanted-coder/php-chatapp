<!DOCTYPE html>
<html>
  <head>
    <title>Cool Chat Interface</title>
    <style>
      /* Chat interface styles */
      .chat-container {
        height: 400px;
        overflow-y: scroll;
      }
      
      .chat-message {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
      }
      
      .chat-message img {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 10px;
      }
      
      .chat-message p {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border-radius: 20px;
        max-width: 70%;
        margin: 0;
      }
      
      .chat-message.right p {
        background-color: #28a745;
      }
      
      /* Input field styles */
      .input-container {
        display: flex;
        align-items: center;
        margin-top: 10px;
      }
      
      .input-container input {
        flex-grow: 1;
        border: none;
        border-radius: 20px;
        padding: 10px;
        font-size: 16px;
        outline: none;
      }
      
      .input-container button {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 20px;
        padding: 10px;
        margin-left: 10px;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="chat-container">
      <div class="chat-message">
        <img src="https://i.pravatar.cc/150?img=1" alt="User Avatar">
        <p>Hello, how are you?</p>
      </div>
      <div class="chat-message right">
        <p>I'm good, thanks! How about you?</p>
        <img src="https://i.pravatar.cc/150?img=2" alt="User Avatar">
      </div>
      <div class="chat-message">
        <img src="https://i.pravatar.cc/150?img=1" alt="User Avatar">
        <p>Doing pretty well, thanks for asking.</p>
      </div>
      <!-- Add more chat messages here -->
    </div>
    <div class="input-container">
      <input type="text" placeholder="Type your message here...">
      <button>Send</button>
    </div>
  </body>
</html>
