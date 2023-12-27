@extends('admins.layouts.app')

@push('title', __('admin-dashboard.Dashboard'))





@section('content')



    <div class="row">
        <div class="col-xl-6">
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <button type="button" class="btn btn-success waves-effect waves-light">الكل</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light">2019</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light">2020</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light">2021</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light">2022</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light">2023</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light">2024</button>
                    </div>
        </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-copy-alt"></i>
                                                        </span>
                                        </div>
                                        <h5 class="font-size-14 mb-0">طلاب وخريجون متميزون وقادرون على المنافسة والابتكار</h5>

                                    </div>
                                    <div class="text-muted mt-2">
                                        <div id="radialBar-chart1" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-archive-in"></i>
                                                        </span>
                                        </div>
                                        <h5 class="font-size-14 mb-0">جودة منظومة الدراسات العليا وأخلاقيات البحث العلمي والابتكار</h5>
                                    </div>
                                    <div class="text-muted mt-2">
                                        <div id="radialBar-chart2" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-archive-in"></i>
                                                        </span>
                                        </div>
                                        <h5 class="font-size-14 mb-0">كسب ثقة المجتمع</h5>
                                    </div>
                                    <div class="text-muted mt-2">
                                        <div id="radialBar-chart3" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-archive-in"></i>
                                                        </span>
                                        </div>
                                        <h5 class="font-size-14 mb-0">ضمان جودة الأداء المؤسسي والتنمية المستدامة</h5>
                                    </div>
                                    <div class="text-muted mt-2">
                                        <div id="radialBar-chart4" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-copy-alt"></i>
                                                        </span>
                                        </div>
                                        <h5 class="font-size-14 mb-0">تنمية الموارد المالية</h5>
                                    </div>
                                    <div class="text-muted mt-2">
                                        <div id="radialBar-chart5" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-archive-in"></i>
                                                        </span>
                                        </div>
                                        <h5 class="font-size-14 mb-0">زيادة القدرة الاستيعابية للجامعة</h5>
                                    </div>
                                    <div class="text-muted mt-2">
                                        <div id="radialBar-chart6" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-archive-in"></i>
                                                        </span>
                                        </div>
                                        <h5 class="font-size-14 mb-0">تعزيز المكــــانــــة الدوليــــة للجــــامــعـــة</h5>
                                    </div>
                                    <div class="text-muted mt-2">
                                        <div id="radialBar-chart7" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-archive-in"></i>
                                                        </span>
                                        </div>
                                        <h5 class="font-size-14 mb-0">جامعة رقمية</h5>
                                    </div>
                                    <div class="text-muted mt-2">
                                        <div id="radialBar-chart8" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-copy-alt"></i>
                                                        </span>
                                        </div>
                                        <h5 class="font-size-14 mb-0">الكتروني رقمي </h5>
                                    </div>
                                    <div class="text-muted mt-2">
                                        <div id="radialBar-chart9" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="bx bx-archive-in"></i>
                                                        </span>
                                        </div>
                                        <h5 class="font-size-14 mb-0">فارغه</h5>
                                    </div>
                                    <div class="text-muted mt-2">
                                        <div id="radialBar-chart10" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
@endsection
@push('scripts')

     <script src="{{asset('/assets/admin/libs/apexcharts/apexcharts.min.js')}}"></script>
     <script src="{{asset('/assets/admin/js/pages/dashboard.init.js')}}"></script>
    <script>
        options = {
            chart: {height: 200, type: "radialBar", offsetY: -10},
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 135,
                    dataLabels: {
                        name: {fontSize: "13px", color: void 0, offsetY: 60},
                        value: {
                            offsetY: 22, fontSize: "16px", color: void 0, formatter: function (e) {
                                return e + "%"
                            }
                        }
                    }
                }
            },
            colors: ["#556ee6"],
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    shadeIntensity: .15,
                    inverseColors: !1,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 50, 65, 91]
                }
            },
            stroke: {dashArray: 4},
            series: [67],
            labels: ["Series A"]
        };
        (chart = new ApexCharts(document.querySelector("#radialBar-chart1"), options)).render();
    </script>
    <script>
                options = {
                    chart: {height: 200, type: "radialBar", offsetY: -10},
                    plotOptions: {
                        radialBar: {
                            startAngle: -135,
                            endAngle: 135,
                            dataLabels: {
                                name: {fontSize: "13px", color: void 0, offsetY: 60},
                                value: {
                                    offsetY: 22, fontSize: "16px", color: void 0, formatter: function (e) {
                                        return e + "%"
                                    }
                                }
                            }
                        }
                    },
                    colors: ["#556ee6"],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shade: "dark",
                            shadeIntensity: .15,
                            inverseColors: !1,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 65, 91]
                        }
                    },
                    stroke: {dashArray: 4},
                    series: [50],
                    labels: ["Series A"]
                };
                (chart = new ApexCharts(document.querySelector("#radialBar-chart2"), options)).render();
            </script>
            <script>
                options = {
                    chart: {height: 200, type: "radialBar", offsetY: -10},
                    plotOptions: {
                        radialBar: {
                            startAngle: -135,
                            endAngle: 135,
                            dataLabels: {
                                name: {fontSize: "13px", color: void 0, offsetY: 60},
                                value: {
                                    offsetY: 22, fontSize: "16px", color: void 0, formatter: function (e) {
                                        return e + "%"
                                    }
                                }
                            }
                        }
                    },
                    colors: ["#556ee6"],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shade: "dark",
                            shadeIntensity: .15,
                            inverseColors: !1,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 65, 91]
                        }
                    },
                    stroke: {dashArray: 4},
                    series: [50],
                    labels: ["Series A"]
                };
                (chart = new ApexCharts(document.querySelector("#radialBar-chart3"), options)).render();
            </script>
            <script>
                options = {
                    chart: {height: 200, type: "radialBar", offsetY: -10},
                    plotOptions: {
                        radialBar: {
                            startAngle: -135,
                            endAngle: 135,
                            dataLabels: {
                                name: {fontSize: "13px", color: void 0, offsetY: 60},
                                value: {
                                    offsetY: 22, fontSize: "16px", color: void 0, formatter: function (e) {
                                        return e + "%"
                                    }
                                }
                            }
                        }
                    },
                    colors: ["#556ee6"],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shade: "dark",
                            shadeIntensity: .15,
                            inverseColors: !1,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 65, 91]
                        }
                    },
                    stroke: {dashArray: 4},
                    series: [10],
                    labels: ["Series A"]
                };
                (chart = new ApexCharts(document.querySelector("#radialBar-chart4"), options)).render();
            </script>
            <script>
                options = {
                    chart: {height: 200, type: "radialBar", offsetY: -10},
                    plotOptions: {
                        radialBar: {
                            startAngle: -135,
                            endAngle: 135,
                            dataLabels: {
                                name: {fontSize: "13px", color: void 0, offsetY: 60},
                                value: {
                                    offsetY: 22, fontSize: "16px", color: void 0, formatter: function (e) {
                                        return e + "%"
                                    }
                                }
                            }
                        }
                    },
                    colors: ["#556ee6"],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shade: "dark",
                            shadeIntensity: .15,
                            inverseColors: !1,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 65, 91]
                        }
                    },
                    stroke: {dashArray: 4},
                    series: [20],
                    labels: ["Series A"]
                };
                (chart = new ApexCharts(document.querySelector("#radialBar-chart5"), options)).render();
            </script>
            <script>
                options = {
                    chart: {height: 200, type: "radialBar", offsetY: -10},
                    plotOptions: {
                        radialBar: {
                            startAngle: -135,
                            endAngle: 135,
                            dataLabels: {
                                name: {fontSize: "13px", color: void 0, offsetY: 60},
                                value: {
                                    offsetY: 22, fontSize: "16px", color: void 0, formatter: function (e) {
                                        return e + "%"
                                    }
                                }
                            }
                        }
                    },
                    colors: ["#556ee6"],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shade: "dark",
                            shadeIntensity: .15,
                            inverseColors: !1,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 65, 91]
                        }
                    },
                    stroke: {dashArray: 4},
                    series: [100],
                    labels: ["Series A"]
                };
                (chart = new ApexCharts(document.querySelector("#radialBar-chart6"), options)).render();
            </script>
            <script>
                options = {
                    chart: {height: 200, type: "radialBar", offsetY: -10},
                    plotOptions: {
                        radialBar: {
                            startAngle: -135,
                            endAngle: 135,
                            dataLabels: {
                                name: {fontSize: "13px", color: void 0, offsetY: 60},
                                value: {
                                    offsetY: 22, fontSize: "16px", color: void 0, formatter: function (e) {
                                        return e + "%"
                                    }
                                }
                            }
                        }
                    },
                    colors: ["#556ee6"],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shade: "dark",
                            shadeIntensity: .15,
                            inverseColors: !1,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 65, 91]
                        }
                    },
                    stroke: {dashArray: 4},
                    series: [40],
                    labels: ["Series A"]
                };
                (chart = new ApexCharts(document.querySelector("#radialBar-chart7"), options)).render();
            </script>
            <script>
                options = {
                    chart: {height: 200, type: "radialBar", offsetY: -10},
                    plotOptions: {
                        radialBar: {
                            startAngle: -135,
                            endAngle: 135,
                            dataLabels: {
                                name: {fontSize: "13px", color: void 0, offsetY: 60},
                                value: {
                                    offsetY: 22, fontSize: "16px", color: void 0, formatter: function (e) {
                                        return e + "%"
                                    }
                                }
                            }
                        }
                    },
                    colors: ["#556ee6"],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shade: "dark",
                            shadeIntensity: .15,
                            inverseColors: !1,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 65, 91]
                        }
                    },
                    stroke: {dashArray: 4},
                    series: [74],
                    labels: ["Series A"]
                };
                (chart = new ApexCharts(document.querySelector("#radialBar-chart8"), options)).render();
            </script>
            <script>
                options = {
                    chart: {height: 200, type: "radialBar", offsetY: -10},
                    plotOptions: {
                        radialBar: {
                            startAngle: -135,
                            endAngle: 135,
                            dataLabels: {
                                name: {fontSize: "13px", color: void 0, offsetY: 60},
                                value: {
                                    offsetY: 22, fontSize: "16px", color: void 0, formatter: function (e) {
                                        return e + "%"
                                    }
                                }
                            }
                        }
                    },
                    colors: ["#556ee6"],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shade: "dark",
                            shadeIntensity: .15,
                            inverseColors: !1,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 65, 91]
                        }
                    },
                    stroke: {dashArray: 4},
                    series: [85],
                    labels: ["Series A"]
                };
                (chart = new ApexCharts(document.querySelector("#radialBar-chart9"), options)).render();
            </script>
            <script>
                options = {
                    chart: {height: 200, type: "radialBar", offsetY: -10},
                    plotOptions: {
                        radialBar: {
                            startAngle: -135,
                            endAngle: 135,
                            dataLabels: {
                                name: {fontSize: "13px", color: void 0, offsetY: 60},
                                value: {
                                    offsetY: 22, fontSize: "16px", color: void 0, formatter: function (e) {
                                        return e + "%"
                                    }
                                }
                            }
                        }
                    },
                    colors: ["#556ee6"],
                    fill: {
                        type: "gradient",
                        gradient: {
                            shade: "dark",
                            shadeIntensity: .15,
                            inverseColors: !1,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 65, 91]
                        }
                    },
                    stroke: {dashArray: 4},
                    series: [90],
                    labels: ["Series A"]
                };
                (chart = new ApexCharts(document.querySelector("#radialBar-chart10"), options)).render();
            </script>

@endpush
