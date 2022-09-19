<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" /> 
    <meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>
    <title>Web-Application for importing data into database from csv file</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @livewireStyles
</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Import csv</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/import">Import</a>
                </li>    
              </ul>  
            </div>
          </div>
        </nav>
    </header>
    @yield("content")
    <br><br><br><br> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @livewireScripts
</body>
</html>
