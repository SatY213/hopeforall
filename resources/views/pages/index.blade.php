@extends('layouts.app')

@section('content')

<button id="donate-button" class="btn btn-lg btn-purple fixed-bottom" data-toggle="modal" data-target="#donateModal">Donate</button>
  <!-- Donation Model -->
  <div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="donateModalLabel">Make a Donation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('donation.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="number" name="amount" id="amount" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message (optional):</label>
                        <textarea name="message" id="message" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Donation</button>
                </form>
            </div>
        </div>
    </div>
</div>
 <!-- Donation Model end -->

  <!-- Header Start -->
  <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
    <div class="row align-items-center px-3">
        <div class="col-lg-6 text-center text-lg-left">
            <h4 class="text-white mb-4 mt-5 mt-lg-0">Charitable Organization</h4>
            <h1 class="display-3 font-weight-bold text-white">We try to make people happy</h1>
            <p class="text-white mb-4">Hopeforall is a charitable organization that aims to provide essential aid and support to underprivileged communities around the world. Their focus areas include providing access to clean water, healthcare, education, and shelter, and they rely on donations and volunteer work to achieve their mission. Through their efforts, they strive to make a positive impact on the lives of those in need.</p>
            <a href="/about" class="btn btn-secondary mt-1 py-3 px-5">Learn More</a>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <img class="img-fluid mt-5" src="{{asset('storage/img/ramadan.png')}}" alt="">
        </div>
        
    </div>
    
</div>


<!-- Header End -->


 <!-- Facilities Start -->
 <div class="container-fluid pt-5">
  <div class="container pb-3">
      <div class="row">
          <div class="col-lg-4 col-md-6 pb-1">
              <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                  <i class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"></i>
                  <div class="pl-4">
                      <h4>Water provision</h4>
                      <p class="m-0">Installing water wells or filtration systems to provide clean drinking water to communities in need.</p>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
              <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                  <i class="flaticon-022-drum h1 font-weight-normal text-primary mb-3"></i>
                  <div class="pl-4">
                      <h4>Healthcare services</h4>
                      <p class="m-0">Establishing a mobile medical clinic to provide healthcare services to underserved areas.</p>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
              <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                  <i class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"></i>
                  <div class="pl-4">
                      <h4>Education</h4>
                      <p class="m-0">Building and operating schools to provide education to children who may not have access to it otherwise.</p>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
              <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                  <i class="flaticon-017-toy-car h1 font-weight-normal text-primary mb-3"></i>
                  <div class="pl-4">
                      <h4>Shelter</h4>
                      <p class="m-0">Constructing and operating shelters for homeless or displaced individuals and families.</p>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
              <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                  <i class="flaticon-025-sandwich h1 font-weight-normal text-primary mb-3"></i>
                  <div class="pl-4">
                      <h4>Food distribution</h4>
                      <p class="m-0">Organizing food distribution programs to provide meals to those who are food insecure.</p>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 pb-1">
              <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                  <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                  <div class="pl-4">
                      <h4>Employment support</h4>
                      <p class="m-0">Providing job training and support services to help people gain employment and improve their economic situation.</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Future Projects -->
<div class="container py-5">
  <h2>Future Projects</h2>
  <div class="row">
    @foreach($projects as $project)
    <div class="col-md-4 mb-4">
      <div class="card">
        <div class="card-header">{{ $project->name }}</div>
        <div class="card-body">
            @if ($project->image)
                <div class="image-container">
                    <img src="{{ asset('storage/project_images/' . $project->image) }}" alt="{{ $project->name }}" class="card-image">
                </div>
            @endif
            <p>{{ $project->description }}</p>
            <p>Starting Date: {{ $project->starting_date }}</p>
            <p>Ending Date: {{ $project->ending_date }}</p>
            <button class="btn btn-primary" data-project-id="{{ $project->id }}" data-toggle="modal" data-target="#participateModal">Participate</button>
        </div>
    </div>
    </div>
    
    
    @endforeach
  </div>
</div>
<!-- Future Projects End -->

<section id="contact" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('storage/img/benevoles.jpg')}}" alt="Contact image" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h2 class="mb-3">Contact Us</h2>

          <p>For any inquiries or questions please email us or fill out the contact form below. We will get back to you as soon as possible.</p>
          <p><strong>Email:</strong> contact@hopeforall.com</p>
          <form method="POST" action="{{ route('contact.submit') }}">
            @csrf
            <div class="form-group">
              <label for="name">Name:</label>
              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
              <label for="message">Message:</label>
              <textarea  id="message" class="form-control" name="message" required>{{ old('message') }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>

<!-- Participate Modal -->
<div class="modal fade" id="participateModal" tabindex="-1" role="dialog" aria-labelledby="participateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="participateModalLabel">Participate in Project</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="{{ route('participation.submit') }}" method="POST">
                  @csrf
                  <input type="hidden" name="project_id" id="project_id" value="">
                  <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" name="name" id="name" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="email" name="email" id="email" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label for="address">Address:</label>
                      <input type="address" name="address" id="address" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label for="phone">Phone:</label>
                      <input type="phone" name="phone" id="phone" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label for="message">Message:</label>
                      <textarea name="message" id="message" class="form-control" required></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit Request</button>
              </form>
          </div>
      </div>
  </div>
</div>


  <footer class="bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>Hopeforall &copy; 2023. All rights reserved.</p>
            </div>
            <div class="col-md-6">
                <ul class="list-inline text-md-right">
                    <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                    <li class="list-inline-item"><a href="/contact">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
  


  
<script>
$(document).ready(function() {
  $('#participateModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var projectId = button.data('project-id');
    var projectName = button.data('project-name'); // Add this line
    var modal = $(this);
    modal.find('.modal-body #project_id').val(projectId);
    modal.find('.modal-body #project_name').val(projectName); // Add this line
  });
});

</script>



<style>
.btn-purple {
  background-color: purple;
  color: white;
  width: 4cm;
  margin-left:1cm; 

 
}
.btn-purple:hover {
  background-color: rgb(82, 3, 82);
  color: white;


 
}

.hidden-form {
  display: none;
  border: 1px solid #030303;
  border-radius: 5px;
  padding: 20px;
  width: 2cm;

}

.card {
        height: 100%;
    }

    .image-container {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .card-image {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .card-body p {
        margin-bottom: 10px;
    }
</style>
<script>
    var donateButton = document.getElementById("donate-button");
    var donationForm = document.getElementById("donation-form");

    donateButton.addEventListener("click", function () {
        donationForm.classList.toggle("hidden-form");
    });
</script>
    
    

@endsection
