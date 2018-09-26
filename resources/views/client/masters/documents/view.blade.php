@extends('client.layout.master')

@section('header')
    View Document
@endsection

@section('vehicle')
    is-active
@endsection


@section('add_button')
    <div class="c-dropdown dropdown">
        <div class="c-avatar c-avatar--xsmall dropdown-toggle" role="button">
            <a href="{{ route('client.editdocument', $document->id) }}"><img class="c-avatar__img" src="https://png.icons8.com/material-rounded/50/000000/pencil.png"></a>
        </div>
    </div>
@endsection


@section('content')
{{--{{$customer}}--}}

        <div class="row">
            <div class="col-xl-12">
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="customer-name">Document Type</label>
                    <select class="c-input" name="type" disabled readonly id="document-type">
                        <option value="qtax" <?php if($document->type=='qtax'){ echo 'selected';} ?> >Q Tax</option>
                        <option value="nptax" <?php if($document->type=='nptax'){ echo 'selected';} ?> >NP Tax</option>
                        <option value="permit" <?php if($document->type=='permit'){ echo 'selected';} ?> >Permit Renewal</option>
                        <option value="finance" <?php if($document->type=='finance'){ echo 'selected';} ?> >Finance Due</option>
                        <option value="pollutioncontrol" <?php if($document->type=='pollutioncontrol'){ echo 'selected';} ?> >Pollution Control</option>
                        <option value="others" <?php if($document->type=='others'){ echo 'selected';} ?> >Others</option>
                    </select>
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-duedate">Due Date</label>
                    <input class="c-input" type="date" value="{{ $document->duedate }}" readonly name="duedate" id="document-duedate">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-notify">Notify Before</label>
                    <input class="c-input" type="number" value="{{ $document->notifyBefore }}" readonly name="notifyBefore" id="document-notify">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-interval">Interval(Months)</label>
                    <input class="c-input" type="number" value="{{ $document->interval }}" readonly name="interval" id="document-interval">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-issuingCompany">Issuing Company</label>
                    <input class="c-input" type="text" value="{{ $document->issuingCompany }}" readonly name="issuingCompany" id="document-issuingCompany">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-amount">Amount</label>
                    <input class="c-input" type="number" value="{{ $document->amount }}" readonly name="amount" id="document-amount">
                </div>
                <div class="c-field u-mb-medium">
                    <label class="c-field__label" for="document-notes">Notes</label>
                    <input class="c-input" type="text" value="{{ $document->notes }}" readonly name="notes" id="document-notes">
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-7 col-xl-12 u-mr-auto u-mb-xsmall">
            <form action="{{ route('client.deletedocument', $document->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class="c-btn c-btn--danger c-btn--fullwidth" onclick="return confirm('Are you sure want to delete the document?')">Delete Document</button>
            </form>
        </div>

@endsection
