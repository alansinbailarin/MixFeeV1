<!-- component -->

<x-app-layout>

    <section class="msger">
        <header class="msger-header">
          <div class="msger-header-title">
            <i class="fas fa-comment-alt"></i> 
            <span class="chatWith"></span>
            <span class="typing" style="display: none">Esta escribiendo</span>
          </div>
          <div class="msger-header-options">
            <span class="chatStatus offline"><i class="fas fa-globe"></i></span>
          </div>
        </header>
      
        <div class="msger-chat"></div>
      
        <form class="msger-inputarea">
          <input type="text" class="msger-input" placeholder="Enter your message...">
          <button type="submit" class="msger-send-btn">Send</button>
        </form>
      </section>

      <script src="http://use.fontawesome.com/releases/v5.0.13/js/all.js"></script>
</x-app-layout>
