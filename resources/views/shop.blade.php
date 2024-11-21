@extends('layouts.app')

@section('titulo', 'Compra de Vestuário')

@section('content')
    <main>
        <div class="container">
            <section class="row w-100 d-flex mt-5 min-vh-100">
                <div class="flex flex-column w-25">
                    <div class="flex flex-column">
                        <h2 class="fw-bold fs-3">Categorias</h2>
                        <a href="#">Vestidos</a>
                        <a href="#">Shorts</a>
                        <a href="#">Moletons</a>
                        <a href="#">Trajes de Banho</a>
                        <a href="#">Jaquetas</a>
                        <a href="#">Camisas e Tops</a>
                        <a href="#">Jeans</a>
                        <a href="#">Calças</a>
                        <a href="#">Homens</a>
                        <a href="#">Mulheres</a>
                    </div>
                    <div class="mt-4">
                        <h2 class="fw-bold fs-3">Cores</h2>
                        <div class="d-flex">
                            <label class="color-checkbox me-2">
                                <input type="checkbox" name="color" value="orange" />
                                <span style="background-color: #f39c12;"></span>
                            </label>
                            <label class="color-checkbox me-2">
                                <input type="checkbox" name="color" value="pink" />
                                <span style="background-color: #e91e63;"></span>
                            </label>
                            <label class="color-checkbox me-2">
                                <input type="checkbox" name="color" value="purple" />
                                <span style="background-color: #4a148c;"></span>
                            </label>
                            <label class="color-checkbox me-2">
                                <input type="checkbox" name="color" value="teal" />
                                <span style="background-color: #1abc9c;"></span>
                            </label>
                            <label class="color-checkbox me-2">
                                <input type="checkbox" name="color" value="cyan" />
                                <span style="background-color: #00bcd4;"></span>
                            </label>
                            <label class="color-checkbox me-2">
                                <input type="checkbox" name="color" value="navy" />
                                <span style="background-color: #34495e;"></span>
                            </label>
                        </div>
                        <div class="d-flex mt-2">
                            <label class="color-checkbox me-2">
                                <input type="checkbox" name="color" value="orange" />
                                <span style="background-color: #8BF026;"></span>
                            </label>
                            <label class="color-checkbox me-2">
                                <input type="checkbox" name="color" value="pink" />
                                <span style="background-color: #A92227;"></span>
                            </label>
                            <label class="color-checkbox me-2">
                                <input type="checkbox" name="color" value="purple" />
                                <span style="background-color: #282E3F;"></span>
                            </label>
                            <label class="color-checkbox me-2">
                                <input type="checkbox" name="color" value="teal" />
                                <span style="background-color: #EC481E;"></span>
                            </label>
                            <label class="color-checkbox me-2">
                                <input type="checkbox" name="color" value="cyan" />
                                <span style="background-color: #6FAA18;"></span>
                            </label>
                            <label class="color-checkbox me-2">
                                <input type="checkbox" name="color" value="navy" />
                                <span style="background-color: #3DDC76;"></span>
                            </label>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h5>Tamanho</h5>
                        <div class="d-flex flex-wrap mb-4">
                            <label class="size-checkbox me-2">
                                <input type="checkbox" name="size" value="PP" />
                                <span>PP</span>
                            </label>
                            <label class="size-checkbox me-2">
                                <input type="checkbox" name="size" value="P" />
                                <span>P</span>
                            </label>
                            <label class="size-checkbox me-2">
                                <input type="checkbox" name="size" value="M" />
                                <span>M</span>
                            </label>
                            <label class="size-checkbox me-2">
                                <input type="checkbox" name="size" value="G" />
                                <span>G</span>
                            </label>
                            <label class="size-checkbox me-2">
                                <input type="checkbox" name="size" value="GG" />
                                <span>GG</span>
                            </label>
                            <label class="size-checkbox me-2">
                                <input type="checkbox" name="size" value="XG" />
                                <span>XG</span>
                            </label>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h5>Marcas</h5>
                        <ul class="list-unstyled">
                            <li>
                                <label class="form-check-label">
                                    <input type="checkbox" name="brand" value="Louis Vuitton"
                                        class="form-check-input me-2" />
                                    Louis Vuitton <span class="text-muted">(8)</span>
                                </label>
                            </li>
                            <li>
                                <label class="form-check-label">
                                    <input type="checkbox" name="brand" value="Adidas" class="form-check-input me-2" />
                                    Adidas <span class="text-muted">(39)</span>
                                </label>
                            </li>
                            <li>
                                <label class="form-check-label">
                                    <input type="checkbox" name="brand" value="Lacoste" class="form-check-input me-2" />
                                    Lacoste <span class="text-muted">(95)</span>
                                </label>
                            </li>
                            <li>
                                <label class="form-check-label">
                                    <input type="checkbox" name="brand" value="Nike" class="form-check-input me-2" />
                                    Nike <span class="text-muted">(1354)</span>
                                </label>
                            </li>
                            <li>
                                <label class="form-check-label">
                                    <input type="checkbox" name="brand" value="Calvin Klein"
                                        class="form-check-input me-2" />
                                    Calvin Klein <span class="text-muted">(2)</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-column justify-content-center w-75">
                    <div class="d-block me-2">
                        <img src="https://via.placeholder.com/800x400" alt="Categoria 1">
                    </div>
                    <div class="mt-5">
                        <h5>Compre Agora</h5>
                        <div class="d-block mt-4">
                            <div class="d-flex">
                                <div class="d-block me-2">
                                    <img src="https://via.placeholder.com/300x400" alt="Categoria 1">
                                    <p class="category-title mt-3">Produto 1</p>
                                </div>
                                <div class="d-block me-2">
                                    <img src="https://via.placeholder.com/300x400" alt="Categoria 2">
                                    <p class="category-title mt-3">Produto 2</p>
                                </div>
                                <div class="d-block me-2">
                                    <img src="https://via.placeholder.com/300x400" alt="Categoria 3">
                                    <p class="category-title mt-3">Produto 3</p>
                                </div>
                                <div class="d-block me-2">
                                    <img src="https://via.placeholder.com/300x400" alt="Categoria 4">
                                    <p class="category-title mt-3">Produto 4</p>
                                </div>
                            </div>
                            <div class="d-flex mt-4">
                                <div class="d-block me-2">
                                    <img src="https://via.placeholder.com/300x400" alt="Categoria 1">
                                    <p class="category-title mt-3">Produto 5</p>
                                </div>
                                <div class="d-block me-2">
                                    <img src="https://via.placeholder.com/300x400" alt="Categoria 2">
                                    <p class="category-title mt-3">Produto 6</p>
                                </div>
                                <div class="d-block me-2">
                                    <img src="https://via.placeholder.com/300x400" alt="Categoria 3">
                                    <p class="category-title mt-3">Produto 7</p>
                                </div>
                                <div class="d-block me-2">
                                    <img src="https://via.placeholder.com/300x400" alt="Categoria 4">
                                    <p class="category-title mt-3">Produto 8</p>
                                </div>
                            </div>
                            <div class=" mt-5 d-flex align-items-center justify-content-center">
                                <a href="{{ route('shopping') }}">Ver tudo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
