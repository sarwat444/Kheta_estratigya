@extends('gehat.layouts.app')

@push('title', __('admin-dashboard.Dashboard'))

@section('content')
    <h4> Gehat Dashboard </h4>
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
