<div id="stepper-example" class="bs-stepper">
  <div class="bs-stepper-header">
    <div class="step" data-target="#test-l-1">
      <a href="#">
        <span class="bs-stepper-circle">1</span>
        <span class="bs-stepper-label">First step</span>
      </a>
    </div>
    <div class="line"></div>
    <div class="step" data-target="#test-l-2">
      <a href="#">
        <span class="bs-stepper-circle">2</span>
        <span class="bs-stepper-label">Second step</span>
      </a>
    </div>
    <div class="line"></div>
    <div class="step" data-target="#test-l-3">
      <a href="#">
        <span class="bs-stepper-circle">3</span>
        <span class="bs-stepper-label">Third step</span>
      </a>
    </div>
  </div>
  <div class="bs-stepper-content">
    <div id="test-l-1" class="content">
      <p class="text-center">test 1</p>
      <button class="btn btn-primary" onclick="myStepper.next()">Next</button>
    </div>
    <div id="test-l-2" class="content">
      <p class="text-center">test 2</p>
      <button class="btn btn-primary" onclick="myStepper.next()">Next</button>
    </div>
    <div id="test-l-3" class="content">
      <p class="text-center">test 3</p>
      <button class="btn btn-primary" onclick="myStepper.next()">Next</button>
      <button class="btn btn-primary" onclick="myStepper.previous()">Previous</button>
    </div>
  </div>
</div>