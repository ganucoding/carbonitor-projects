@extends('errors::minimal')

@section('title', __('Access Denied'))
@section('code', '403')
@section('message', __('It looks like you haven’t been approved by an admin yet. Please wait for approval to access the
    admin login.'))
