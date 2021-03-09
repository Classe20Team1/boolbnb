@extends('layouts.boolbnb')

@section('title')
  Info Utente
@endsection

@section('content')

<section class="user-details-container">
  <div class="user-details-tab">
    <div class="user-details-left">
      <ul>
        <li>
          <i class="far fa-id-card"></i>
          <span>Full Name</span>
        </li>
        <li>
          <i class="fas fa-birthday-cake"></i>
          <span>Birthdate</span>
        </li>
        <li>
          <i class="fas fa-venus-mars"></i>
          <span>Sex</span>
        </li>
        <li>
          <i class="fas fa-phone"></i>
          <span>Phone Number</span>
        </li>
        <li>
          <i class="far fa-id-card"></i>
          <span>Fiscal Code</span>
        </li>
        <li>
          <i class="far fa-credit-card"></i>
          <span>VAT Number</span>
        </li>
        <li>
          <i class="fas fa-home"></i>
          <span>Address</span>
        </li>
      </ul>
    </div>
    <div class="user-details-right">
      <ul>
        <li>
          {{ $info->fullname }}
        </li>
        <li>
          {{ $info->birthdate }}
        </li>
        <li>
          {{ $info->sex  }}
        </li>
        <li>
          {{ $info->phone_number }}
        </li>
        <li>
          {{ $info->fiscal_code }}
        </li>
        <li>
          {{ $info->p_iva }}
        </li>
        <li>
          {{ $info->address }}
        </li>
      </ul>
    </div>
  </div>
</section>
@endsection
