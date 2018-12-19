@extends('layouts.public')
@section('title', '- About')
@section('content')
    <a name="about" class="hide-for-medium"></a>
    <div id="br-breadcrumbs">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell medium-12">
                <nav aria-label="You are here:" role="navigation">
                  <ul class="breadcrumbs">
                    <li class="hide-for-medium"><a href="{{ url('./') }}#mobile">Home</a></li>
                    <li class="show-for-medium"><a href="{{ url('./') }}">Home</a></li>
                    <li>
                      <span class="show-for-sr">Current: </span> About the Author
                    </li>
                  </ul>
                </nav>
            </div> <!-- .cell .medium-12 -->
        </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- grid-container -->
    </div> <!-- breadcrumbs -->
    <div id="article-title">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell medium-12">
                <h1 class="h2">About the Author</h1>
                <img id="portrait" src="{{ asset('img/Rich_author_photo.jpg') }}" alt="">
                <p class="lead">Bruce Rich is an American writer and lawyer who has published extensively on the environment in development countries and development in general, as well as on history and philosophy. He has worked with major U.S. environmental groups and international organizations over the past three and a half decades.</p>

                <p>Enjoying improbable challenges, he has campaigned for higher environmental and social standards in the World Bank and other international financial institutions, and has written an historical and philosophical work on the need for a shared ethic for our economically globalized era, To Uphold the World: A Call for a New Global Ethic from Ancient India (Beacon Press, 2010). <em>To Uphold the World: A Call for a New Global Ethic from Ancient India</em> (Beacon Press, 2010).  To Uphold the World garnered high praise from the Dalai Lama and Nobel Economics Laureate Amartya Sen, who contributed an afterword and a foreward. An expanded paperback version was published as Ashoka In Our Time: The Question of Dharma for a Globalized World (Penguin South Asia, 2017).   His analysis of Ashoka also appeared in a collection of the best Buddhist writing in America for 2012.</p>

                <p>Rich is also the author of Mortgaging the Earth (Beacon Press, Boston, and Earthscan, London, 1994; Island Press, 2013), a critique of the World Bank and reflection on the project of economic development in the West.  Mortgaging was widely acclaimed in reviews ranging from the New York Times to Le Monde Diplomatique.  More recently, Foreclosing the Future (Island Press, 2013) recounts, through the prism of the World Bank, the geopolitics of the global environment, examining worldwide challenges of governance, climate change, corruption, and the tension between political economy and ecology.</p>

                <p>Awarded the United Nations Environment Program Global 500 Award for Environmental Achievement, he has testified many times before the U.S. Congress concerning U.S. participation in international financial institutions. Rich has written for publications such as the Financial Times, The Ecologist, and The Nation, as well as for Environmental Forum, the policy journal of the Washington DC Environmental Law Institute, where he is a Visiting Scholar.</p>

                <p>He is working on a new book exploring the dilemmas of our globalized, fractured world through the lenses of travel, history, and philosophy.</p>
            </div> <!-- .cell .medium-12 -->
        </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #article-title -->
@endsection
