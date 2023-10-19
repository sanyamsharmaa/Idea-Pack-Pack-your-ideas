<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Idea Pack:Tasks</title>
  <link rel="icon" href="Logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="IG.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</head>

<body style="background-image: url('https://c0.wallpaperflare.com/preview/644/684/1003/career-path-choices-organization.jpg');
background-attachment: fixed;">
  <header>
    <header>
      <nav class="navbar  navbar-expand-lg  bg-warning p-1 shadow-lg  mb-5  navbar-fixed-top ">
        <div class="container-fluid">
          <a class="navbar-brand link-light fs-3 fw-bolder " href="home.html">Idea Pack</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ">
              <li class="nav-item ">
                <a class="nav-link " aria-current="page" href="home.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bolder" href="tasks.html">Tasks</a>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Categories
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item " href="projects.php">Project ideas</a></li>
                  <li><a class="dropdown-item" href="#">Business ideas</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
  </header>
  <main>
    <div class="cntr mt-5 mx-auto w-75 shadow-lg ">
      <form action="form.php" method="post">
        <div class="input-group mb-1 position-relative start-50 translate-middle ">
          <input type="hidden" name="adbtn" id="adbtn" value='add1'>
          <input type="text" class="form-control" name="tdtn" id="tdtn" placeholder="Your task ..."
            aria-label="Recipient's username" aria-describedby="button-addon2">
          <button type="submit" name="adbtn" class="btn btn-success">Add</button>
        </div>
      </form>
      <ul class="list-group ">
        <li class="list-group-item d-flex p-1 justify-content-between align-items-center fs-5 ">
          <div>To bring all the items for hostel</div>
          <div>
            <form action="form.php" method="post">
            <input type="hidden" name="edtbtn" id="edtbtn" value="1">
            <input type="hidden" name="dltbtn" id="dltbtn" value="1">
            <button type="submit" class="btn btn-warning" name="edtbtn" onclick="edtask(this)">Edit</button>
            <button type="submit" class="btn btn-danger  ml-2" name="dltbtn" onclick="dltask(this)">Remove</button></form>
          </div>
        </li>
        <?php include('lstasks.php'); ?>  <!-- php code do not run without .php extension -->   
        <a href="tstph.php">99999999</a> 
      </ul>
    </div>

  </main>
  <script>
    let tskc = document.getElementsByClassName("list-group")[0]
    if (tskc.length == 0) {
      let emg = document.createElement('h4')
      emg.textContent = 'No tasks, add tasks'
      tskc.appendChild(emg)
    }
    let adbn = document.getElementsByClassName("btn-success")[0]
    adbn.addEventListener('click', addtask)

    function addtask(e) {
      let inp = adbn.previousElementSibling.value
      let nutsk = document.createElement('li')
      nutsk.setAttribute('class', ' fs-5 list-group-item d-flex justify-content-between align-items-center p-1')
      nutsk.innerHTML = `<div>${inp}</div>`
      let div = document.createElement('div')
      div.innerHTML += '<button type="button" class="btn btn-warning mx-1 my-1" onclick="edtask(this)">Edit</button>' + '<button type="button" class="btn btn-danger" onclick="dltask(this)">Remove</button>'
      nutsk.appendChild(div)
      if (tskc.firstElementChild.textContent != 'No tasks, add tasks') {
        let fstcd = document.getElementsByClassName('list-group')[0].firstElementChild
        fstcd.before(nutsk)
        console.log(tskc.children.length)
      }
      else {
        console.log(tskc.firstElementChild)
        tskc.firstElementChild.remove()
        tskc.appendChild(nutsk)
      }
    }

    function dltask(dbtn) {
      dbtn.parentElement.parentElement.remove()
      // let pli=dbtn.parentElement.parentElement
      // pli.parentElement.removeChild(pli)    another method to remove
      console.log(tskc.children.length)
      if (tskc.children.length == 0) {
        let emg = document.createElement('div')
        emg.setAttribute('class', 'text-black-50 d-flex justify-content-center align-items-center w-100 h-50 bg-light')
        emg.innerHTML = '<h5>No tasks, add tasks</h5>'
        tskc.appendChild(emg)
      }
    }
    function edtask(edbtn) {
      let txtele = edbtn.parentElement.previousElementSibling
      console.log(txtele)
      if (edbtn.textContent == 'Edit') {
        edbtn.textContent = 'Save'
        edbtn.classList.remove('btn-warning')
        edbtn.classList.add('btn-success')
        let inp = document.createElement('input')
        inp.type = 'text'
        inp.placeholder = 'new task'
        inp.className = 'form-control w-75'
        inp.value = txtele.textContent
        txtele.parentElement.replaceChild(inp, txtele)
      }
      else {
        edbtn.textContent = 'Edit'
        edbtn.classList.add('btn-warning')
        edbtn.classList.remove('btn-success')
        let nwt = document.createElement('div')
        nwt.textContent = txtele.value
        txtele.parentElement.replaceChild(nwt, txtele)

      }

    }

  </script>

</body>

</html>