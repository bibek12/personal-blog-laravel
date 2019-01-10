@extends('layouts.admin')
@section('title')Admin Dashboard @endsection();
@section('content')
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">{{App\Post::all()->count()}}</span>
                                    <span class="font-weight-light">All Post</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="icon icon-paper-clip"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card p-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">{{App\Comment::all()->count()}}</span>
                                    <span class="font-weight-light">All Comments</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="icon icon-book-open"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card p-4">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="h4 d-block font-weight-normal mb-2">{{App\User::all()->count()}}</span>
                                    <span class="font-weight-light">All Users</span>
                                </div>

                                <div class="h2 text-muted">
                                    <i class="icon icon-people"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Total Users
                            </div>

                            <div class="card-body p-0">
                                <div class="p-4">
                                    <canvas id="line-chart" width="100%" height="20"></canvas>
                                </div>

                                <div class="justify-content-around mt-4 p-4 bg-light d-flex border-top d-md-down-none">
                                    <div class="text-center">
                                        <div class="text-muted small">Total Traffic</div>
                                        <div>12,457 Users (40%)</div>
                                    </div>

                                    <div class="text-center">
                                        <div class="text-muted small">Banned Users</div>
                                        <div>95,333 Users (5%)</div>
                                    </div>

                                    <div class="text-center">
                                        <div class="text-muted small">Page Views</div>
                                        <div>957,565 Pages (50%)</div>
                                    </div>

                                    <div class="text-center">
                                        <div class="text-muted small">Total Downloads</div>
                                        <div>957,565 Files (100 TB)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endSection