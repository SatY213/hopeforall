@extends('layouts.app')

@section('content')
  <!-- Home page content... -->

  <div class="services-section" style="margin: 50px 0; margin-left: 1cm;">
    <h2 style="text-align: center; font-size: 2rem; margin-bottom: 30px; color: purple;">Our Services</h2>
    <div class="service">
      <h3 style="font-size: 1.5rem; margin-bottom: 10px; color: purple;">Water Provision</h3>
      <p>Installing water wells or filtration systems to provide clean drinking water to communities in need. We work with local communities to assess their water needs and implement sustainable solutions that improve access to safe and clean water sources.</p>
    </div>
    <div class="service">
      <h3 style="font-size: 1.5rem; margin-bottom: 10px; color: purple;">Healthcare Services</h3>
      <p>Establishing a mobile medical clinic to provide healthcare services to underserved areas. Our team of healthcare professionals travels to remote locations, offering medical consultations, preventive care, vaccinations, and essential medicines to those who lack access to adequate healthcare.</p>
    </div>
    <div class="service">
      <h3 style="font-size: 1.5rem; margin-bottom: 10px; color: purple;">Education</h3>
      <p>Building and operating schools to provide education to children who may not have access to it otherwise. We believe that education is a fundamental right, and we are committed to creating safe and inclusive learning environments that empower children and equip them with the knowledge and skills they need to thrive.</p>
    </div>
    <div class="service">
      <h3 style="font-size: 1.5rem; margin-bottom: 10px; color: purple;">Shelter</h3>
      <p>Constructing and operating shelters for homeless or displaced individuals and families. We provide a safe and supportive environment where individuals and families can find temporary housing, along with essential services such as meals, healthcare, and counseling, to help them transition towards permanent housing.</p>
    </div>
    <div class="service">
      <h3 style="font-size: 1.5rem; margin-bottom: 10px; color: purple;">Food Distribution</h3>
      <p>Organizing food distribution programs to provide meals to those who are food insecure. We collaborate with local partners, food banks, and volunteers to collect and distribute food to vulnerable populations, ensuring that nutritious meals reach those who are in need, particularly during times of crisis or emergencies.</p>
    </div>
    <div class="service">
      <h3 style="font-size: 1.5rem; margin-bottom: 10px; color: purple;">Employment Support</h3>
      <p>Providing job training and support services to help people gain employment and improve their economic situation. We offer vocational training programs, mentorship, and job placement assistance to empower individuals with the skills and resources they need to secure stable employment and achieve financial independence.</p>
    </div>
  </div>

  <!-- More home page content... -->

  <style>
    .services-section .service {
      margin-bottom: 30px;
    }
  </style>

@endsection
