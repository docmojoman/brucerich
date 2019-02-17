@extends('layouts.public')
@section('title', '- All Tags')
@section('content')
    <a name="insights" class="hide-for-medium"></a>
    <div id="br-breadcrumbs">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <nav aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
              <li class="hide-for-medium"><a href="{{ url('./') }}#mobile">Home</a></li>
              <li class="show-for-medium"><a href="{{ url('./') }}">Home</a></li>
              <li>
                <span class="show-for-sr">Current: </span> All Tags
              </li>
            </ul>
          </nav>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- grid-container -->
    </div> <!-- breadcrumbs -->
    <div id="blog-title">
    <div class="grid-container">
      <div class="grid-x grid-margin-x">
        <div class="cell medium-12">
          <h1 class="h2 uppercase black">Tags</h1>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta veritatis reiciendis, ex officia ut quibusdam, fuga? Rem doloremque, eos molestias esse quibusdam in dolores architecto error odio est aliquid neque.</p>
        </div> <!-- .cell .medium-12 -->
      </div> <!-- .grid-x .grid-margin-x -->
    </div> <!-- .grid-container -->
    </div> <!-- #blog-title -->
    <div id="blog-list">
    <div class="grid-container">
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">A</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['a'])
      	@php
      		$aCount = round(count($ordered['a'])/3);
      		$aColOne = array_slice($ordered['a'], 0, $aCount);
      		$aColTwo = array_slice($ordered['a'], $aCount, $aCount);
      		$aColThree = array_slice($ordered['a'], ($aCount*2), $aCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($aColOne as $a1)
	        		<li><a href="tag/{{ $a1->slug }}">{{ $a1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($aColTwo as $a2)
	        		<li><a href="tag/{{ $a2->slug }}">{{ $a2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($aColThree as $a3)
	        		<li><a href="tag/{{ $a3->slug }}">{{ $a3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">B</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['b'])
      	@php
      		$bCount = round(count($ordered['b'])/3);
      		$bColOne = array_slice($ordered['b'], 0, $bCount);
      		$bColTwo = array_slice($ordered['b'], $bCount, $bCount);
      		$bColThree = array_slice($ordered['b'], ($bCount*2), $bCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($bColOne as $b1)
	        		<li><a href="tag/{{ $b1->slug }}">{{ $b1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($bColTwo as $b2)
	        		<li><a href="tag/{{ $b2->slug }}">{{ $b2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($bColThree as $b3)
	        		<li><a href="tag/{{ $b3->slug }}">{{ $b3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">C</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['c'])
      	@php
      		$cCount = round(count($ordered['c'])/3);
      		$cColOne = array_slice($ordered['c'], 0, $cCount);
      		$cColTwo = array_slice($ordered['c'], $cCount, $cCount);
      		$cColThree = array_slice($ordered['c'], ($cCount*2), $cCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($cColOne as $c1)
	        		<li><a href="tag/{{ $c1->slug }}">{{ $c1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($cColTwo as $c2)
	        		<li><a href="tag/{{ $c2->slug }}">{{ $c2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($cColThree as $c3)
	        		<li><a href="tag/{{ $c3->slug }}">{{ $c3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">D</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['d'])
      	@php
      		$dCount = round(count($ordered['d'])/3);
      		$dColOne = array_slice($ordered['d'], 0, $dCount);
      		$dColTwo = array_slice($ordered['d'], $dCount, $dCount);
      		$dColThree = array_slice($ordered['d'], ($dCount*2), $dCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($dColOne as $d1)
	        		<li><a href="tag/{{ $d1->slug }}">{{ $d1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($dColTwo as $d2)
	        		<li><a href="tag/{{ $d2->slug }}">{{ $d2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($dColThree as $d3)
	        		<li><a href="tag/{{ $d3->slug }}">{{ $d3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">E</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['e'])
      	@php
      		$eCount = round(count($ordered['e'])/3);
      		$eColOne = array_slice($ordered['e'], 0, $eCount);
      		$eColTwo = array_slice($ordered['e'], $eCount, $eCount);
      		$eColThree = array_slice($ordered['e'], ($eCount*2), $eCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($eColOne as $e1)
	        		<li><a href="tag/{{ $e1->slug }}">{{ $e1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($eColTwo as $e2)
	        		<li><a href="tag/{{ $e2->slug }}">{{ $e2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($eColThree as $e3)
	        		<li><a href="tag/{{ $e3->slug }}">{{ $e3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">F</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['f'])
      	@php
      		$fCount = round(count($ordered['f'])/3);
      		$fColOne = array_slice($ordered['f'], 0, $fCount);
      		$fColTwo = array_slice($ordered['f'], $fCount, $fCount);
      		$fColThree = array_slice($ordered['f'], ($fCount*2), $fCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($fColOne as $f1)
	        		<li><a href="tag/{{ $f1->slug }}">{{ $f1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($fColTwo as $f2)
	        		<li><a href="tag/{{ $f2->slug }}">{{ $f2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($fColThree as $f3)
	        		<li><a href="tag/{{ $f3->slug }}">{{ $f3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">G</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['g'])
      	@php
      		$gCount = round(count($ordered['g'])/3);
      		$gColOne = array_slice($ordered['g'], 0, $gCount);
      		$gColTwo = array_slice($ordered['g'], $gCount, $gCount);
      		$gColThree = array_slice($ordered['g'], ($gCount*2), $gCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($gColOne as $g1)
	        		<li><a href="tag/{{ $g1->slug }}">{{ $g1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($gColTwo as $g2)
	        		<li><a href="tag/{{ $g2->slug }}">{{ $g2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($gColThree as $g3)
	        		<li><a href="tag/{{ $g3->slug }}">{{ $g3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">H</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['h'])
      	@php
      		$hCount = round(count($ordered['h'])/3);
      		$hColOne = array_slice($ordered['h'], 0, $hCount);
      		$hColTwo = array_slice($ordered['h'], $hCount, $hCount);
      		$hColThree = array_slice($ordered['h'], ($hCount*2), $hCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($hColOne as $h1)
	        		<li><a href="tag/{{ $h1->slug }}">{{ $h1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($hColTwo as $h2)
	        		<li><a href="tag/{{ $h2->slug }}">{{ $h2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($hColThree as $h3)
	        		<li><a href="tag/{{ $h3->slug }}">{{ $h3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">I</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['i'])
      	@php
      		$iCount = round(count($ordered['i'])/3);
      		$iColOne = array_slice($ordered['i'], 0, $iCount);
      		$iColTwo = array_slice($ordered['i'], $iCount, $iCount);
      		$iColThree = array_slice($ordered['i'], ($iCount*2), $iCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($iColOne as $i1)
	        		<li><a href="tag/{{ $i1->slug }}">{{ $i1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($iColTwo as $i2)
	        		<li><a href="tag/{{ $i2->slug }}">{{ $i2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($iColThree as $i3)
	        		<li><a href="tag/{{ $i3->slug }}">{{ $i3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">J</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['j'])
      	@php
      		$jCount = round(count($ordered['j'])/3);
      		$jColOne = array_slice($ordered['j'], 0, $jCount);
      		$jColTwo = array_slice($ordered['j'], $jCount, $jCount);
      		$jColThree = array_slice($ordered['j'], ($jCount*2), $jCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($jColOne as $j1)
	        		<li><a href="tag/{{ $j1->slug }}">{{ $j1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($jColTwo as $j2)
	        		<li><a href="tag/{{ $j2->slug }}">{{ $j2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($jColThree as $j3)
	        		<li><a href="tag/{{ $j3->slug }}">{{ $j3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">K</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['k'])
      	@php
      		$kCount = round(count($ordered['k'])/3);
      		$kColOne = array_slice($ordered['k'], 0, $kCount);
      		$kColTwo = array_slice($ordered['k'], $kCount, $kCount);
      		$kColThree = array_slice($ordered['k'], ($kCount*2), $kCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($kColOne as $k1)
	        		<li><a href="tag/{{ $k1->slug }}">{{ $k1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($kColTwo as $k2)
	        		<li><a href="tag/{{ $k2->slug }}">{{ $k2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($kColThree as $k3)
	        		<li><a href="tag/{{ $k3->slug }}">{{ $k3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">L</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['l'])
      	@php
      		$lCount = round(count($ordered['l'])/3);
      		$lColOne = array_slice($ordered['l'], 0, $lCount);
      		$lColTwo = array_slice($ordered['l'], $lCount, $lCount);
      		$lColThree = array_slice($ordered['l'], ($lCount*2), $lCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($lColOne as $l1)
	        		<li><a href="tag/{{ $l1->slug }}">{{ $l1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($lColTwo as $l2)
	        		<li><a href="tag/{{ $l2->slug }}">{{ $l2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($lColThree as $l3)
	        		<li><a href="tag/{{ $l3->slug }}">{{ $l3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">M</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['m'])
      	@php
      		$mCount = round(count($ordered['m'])/3);
      		$mColOne = array_slice($ordered['m'], 0, $mCount);
      		$mColTwo = array_slice($ordered['m'], $mCount, $mCount);
      		$mColThree = array_slice($ordered['m'], ($mCount*2), $mCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($mColOne as $m1)
	        		<li><a href="tag/{{ $m1->slug }}">{{ $m1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($mColTwo as $m2)
	        		<li><a href="tag/{{ $m2->slug }}">{{ $m2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($mColThree as $m3)
	        		<li><a href="tag/{{ $m3->slug }}">{{ $m3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">N</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['n'])
      	@php
      		$nCount = round(count($ordered['n'])/3);
      		$nColOne = array_slice($ordered['n'], 0, $nCount);
      		$nColTwo = array_slice($ordered['n'], $nCount, $nCount);
      		$nColThree = array_slice($ordered['n'], ($nCount*2), $nCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($nColOne as $n1)
	        		<li><a href="tag/{{ $n1->slug }}">{{ $n1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($nColTwo as $n2)
	        		<li><a href="tag/{{ $n2->slug }}">{{ $n2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($nColThree as $n3)
	        		<li><a href="tag/{{ $n3->slug }}">{{ $n3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">O</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['o'])
      	@php
      		$oCount = round(count($ordered['o'])/3);
      		$oColOne = array_slice($ordered['o'], 0, $oCount);
      		$oColTwo = array_slice($ordered['o'], $oCount, $oCount);
      		$oColThree = array_slice($ordered['o'], ($oCount*2), $oCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($oColOne as $o1)
	        		<li><a href="tag/{{ $o1->slug }}">{{ $o1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($oColTwo as $o2)
	        		<li><a href="tag/{{ $o2->slug }}">{{ $o2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($oColThree as $o3)
	        		<li><a href="tag/{{ $o3->slug }}">{{ $o3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">P</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['p'])
      	@php
      		$pCount = round(count($ordered['p'])/3);
      		$pColOne = array_slice($ordered['p'], 0, $pCount);
      		$pColTwo = array_slice($ordered['p'], $pCount, $pCount);
      		$pColThree = array_slice($ordered['p'], ($pCount*2), $pCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($pColOne as $p1)
	        		<li><a href="tag/{{ $p1->slug }}">{{ $p1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($pColTwo as $p2)
	        		<li><a href="tag/{{ $p2->slug }}">{{ $p2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($pColThree as $p3)
	        		<li><a href="tag/{{ $p3->slug }}">{{ $p3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
	        @endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">Q</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['q'])
      	@php
      		$qCount = round(count($ordered['q'])/3);
      		$qColOne = array_slice($ordered['q'], 0, $qCount);
      		$qColTwo = array_slice($ordered['q'], $qCount, $qCount);
      		$qColThree = array_slice($ordered['q'], ($qCount*2), $qCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($qColOne as $q1)
	        		<li><a href="tag/{{ $q1->slug }}">{{ $q1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($qColTwo as $q2)
	        		<li><a href="tag/{{ $q2->slug }}">{{ $q2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($qColThree as $q3)
	        		<li><a href="tag/{{ $q3->slug }}">{{ $q3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
		@endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">R</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['r'])
      	@php
      		$rCount = round(count($ordered['r'])/3);
      		$rColOne = array_slice($ordered['r'], 0, $rCount);
      		$rColTwo = array_slice($ordered['r'], $rCount, $rCount);
      		$rColThree = array_slice($ordered['r'], ($rCount*2), $rCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($rColOne as $r1)
	        		<li><a href="tag/{{ $r1->slug }}">{{ $r1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($rColTwo as $r2)
	        		<li><a href="tag/{{ $r2->slug }}">{{ $r2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($rColThree as $r3)
	        		<li><a href="tag/{{ $r3->slug }}">{{ $r3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
		@endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">S</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['s'])
      	@php
      		$sCount = round(count($ordered['s'])/3);
      		$sColOne = array_slice($ordered['s'], 0, $sCount);
      		$sColTwo = array_slice($ordered['s'], $sCount, $sCount);
      		$sColThree = array_slice($ordered['s'], ($sCount*2), $sCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($sColOne as $s1)
	        		<li><a href="tag/{{ $s1->slug }}">{{ $s1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($sColTwo as $s2)
	        		<li><a href="tag/{{ $s2->slug }}">{{ $s2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($sColThree as $s3)
	        		<li><a href="tag/{{ $s3->slug }}">{{ $s3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
		@endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">T</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['t'])
      	@php
      		$tCount = round(count($ordered['t'])/3);
      		$tColOne = array_slice($ordered['t'], 0, $tCount);
      		$tColTwo = array_slice($ordered['t'], $tCount, $tCount);
      		$tColThree = array_slice($ordered['t'], ($tCount*2), $tCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($tColOne as $t1)
	        		<li><a href="tag/{{ $t1->slug }}">{{ $t1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($tColTwo as $t2)
	        		<li><a href="tag/{{ $t2->slug }}">{{ $t2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($tColThree as $t3)
	        		<li><a href="tag/{{ $t3->slug }}">{{ $t3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
		@endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">U</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['u'])
      	@php
      		$uCount = round(count($ordered['u'])/3);
      		$uColOne = array_slice($ordered['u'], 0, $uCount);
      		$uColTwo = array_slice($ordered['u'], $uCount, $uCount);
      		$uColThree = array_slice($ordered['u'], ($uCount*2), $uCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($uColOne as $u1)
	        		<li><a href="tag/{{ $u1->slug }}">{{ $u1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($uColTwo as $u2)
	        		<li><a href="tag/{{ $u2->slug }}">{{ $u2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($uColThree as $u3)
	        		<li><a href="tag/{{ $u3->slug }}">{{ $u3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
		@endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">V</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['v'])
      	@php
      		$vCount = round(count($ordered['v'])/3);
      		$vColOne = array_slice($ordered['v'], 0, $vCount);
      		$vColTwo = array_slice($ordered['v'], $vCount, $vCount);
      		$vColThree = array_slice($ordered['v'], ($vCount*2), $vCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($vColOne as $v1)
	        		<li><a href="tag/{{ $v1->slug }}">{{ $v1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($vColTwo as $v2)
	        		<li><a href="tag/{{ $v2->slug }}">{{ $v2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($vColThree as $v3)
	        		<li><a href="tag/{{ $v3->slug }}">{{ $v3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
		@endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">W</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['w'])
      	@php
      		$wCount = round(count($ordered['w'])/3);
      		$wColOne = array_slice($ordered['w'], 0, $wCount);
      		$wColTwo = array_slice($ordered['w'], $wCount, $wCount);
      		$wColThree = array_slice($ordered['w'], ($wCount*2), $wCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($wColOne as $w1)
	        		<li><a href="tag/{{ $w1->slug }}">{{ $w1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($wColTwo as $w2)
	        		<li><a href="tag/{{ $w2->slug }}">{{ $w2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($wColThree as $w3)
	        		<li><a href="tag/{{ $w3->slug }}">{{ $w3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
		@endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">X</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['x'])
      	@php
      		$xCount = round(count($ordered['x'])/3);
      		$xColOne = array_slice($ordered['x'], 0, $xCount);
      		$xColTwo = array_slice($ordered['x'], $xCount, $xCount);
      		$xColThree = array_slice($ordered['x'], ($xCount*2), $xCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($xColOne as $x1)
	        		<li><a href="tag/{{ $x1->slug }}">{{ $x1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($xColTwo as $x2)
	        		<li><a href="tag/{{ $x2->slug }}">{{ $x2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($xColThree as $x3)
	        		<li><a href="tag/{{ $x3->slug }}">{{ $x3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
		@endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">Y</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['y'])
      	@php
      		$yCount = round(count($ordered['y'])/3);
      		$yColOne = array_slice($ordered['y'], 0, $yCount);
      		$yColTwo = array_slice($ordered['y'], $yCount, $yCount);
      		$yColThree = array_slice($ordered['y'], ($yCount*2), $yCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($yColOne as $y1)
	        		<li><a href="tag/{{ $y1->slug }}">{{ $y1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($yColTwo as $y2)
	        		<li><a href="tag/{{ $y2->slug }}">{{ $y2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($yColThree as $y3)
	        		<li><a href="tag/{{ $y3->slug }}">{{ $y3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
		@endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
	<!-- letter row -->
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<h1 class="h2 uppercase black">Z</h1>
	        </div> <!-- /medium-4 -->
      </div>
      <div class="grid-x grid-margin-x">
      	@isset($ordered['z'])
      	@php
      		$zCount = round(count($ordered['z'])/3);
      		$zColOne = array_slice($ordered['z'], 0, $zCount);
      		$zColTwo = array_slice($ordered['z'], $zCount, $zCount);
      		$zColThree = array_slice($ordered['z'], ($zCount*2), $zCount);
      	@endphp
	        <!-- columns -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($zColOne as $z1)
	        		<li><a href="tag/{{ $z1->slug }}">{{ $z1->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($zColTwo as $z2)
	        		<li><a href="tag/{{ $z2->slug }}">{{ $z2->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <div class="cell medium-4">
	        	<ul class="tag-list">
	        		@foreach($zColThree as $z3)
	        		<li><a href="tag/{{ $z3->slug }}">{{ $z3->name }}</a></li>
	        		@endforeach
	        	</ul>
	        </div> <!-- /medium-4 -->
	        <!-- /columns -->
		@endisset
	    </div>
      <div class="grid-x grid-margin-x">
	        <div class="cell medium-12">
	        	<hr>
	        </div> <!-- /medium-4 -->
      </div>
    <!-- /letter row -->
    </div> <!-- grid-container -->
    </div> <!-- /#blog-list -->
    </div> <!-- blog nav -->
@endsection
