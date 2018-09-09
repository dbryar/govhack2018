<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="/startup">Startup!</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/startup">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/startup/process">Process</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="/startup/steps" id="DD01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Steps</a>
            <div class="dropdown-menu" aria-labelledby="DD01">
              <a class="dropdown-item" href="/startup/step/1">Business Planning</a>
              <a class="dropdown-item" href="/startup/step/2">Getting Registered</a>
              <a class="dropdown-item" href="/startup/step/3">Digital Rediness</a>
              <a class="dropdown-item" href="/startup/step/4">Sage Advice</a>
            </div>
          </li>
<?php if($this->session->preference == 'chat') { ?>
          <li class="nav-item">
            <a class="nav-link" href="/startup/forms">I'd rather Forms</a>
          </li>
<?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="/startup/chat">I'd Rather Chat</a>
          </li>
<?php } ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
