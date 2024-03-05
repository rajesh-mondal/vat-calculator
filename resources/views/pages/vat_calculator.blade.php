@extends('layouts.apps')

@section('content')
<div class="container">
    {{-- <h1 class="mt-5">VAT Calculator</h1> --}}
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('vat.calculate') }}">
                @csrf
                <h2 class="mt-5 pb-2">VAT Calculator</h2>
                <div class="mb-3">
                    <label for="gross_sum" class="form-label">Gross Sum</label>
                    <input type="number" step="0.01" min="0" class="form-control" id="gross_sum" name="gross_sum" required>
                </div>
                <div class="mb-3">
                    <label for="vat_operation" class="form-label">VAT Calculation Operation</label>
                    <select class="form-select" id="vat_operation" name="vat_operation">
                        <option value="include">Include VAT</option>
                        <option value="exclude">Exclude VAT</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tax_percentage" class="form-label">Tax Percentage (%)</label>
                    <input type="number" step="0.01" min="0" class="form-control" id="tax_percentage" name="tax_percentage" required>
                </div>
                <button type="submit" class="btn btn-primary">Calculate</button>
            </form>
        </div>
    </div>

    @isset($vatAmount)
    <div class="row justify-content-center mt-3">
        <div class="col-md-6">
            <div class="alert alert-success" role="alert">
                VAT Amount: {{ $vatAmount }}
            </div>
        </div>
    </div>
    @endisset
</div>
@endsection
