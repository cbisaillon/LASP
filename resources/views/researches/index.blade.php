@extends('layouts.app')
@section('title', 'Researches on LASP')

@section('content')
    <h1>{{__('Our researches')}}</h1>
    <p>
        LASP and LAOP were made by the Laboratoire Recherche Informatique Maisonneuve (LRIMa) at Montreal, Canada.
    </p>
    <div class="row">
        <div class="col-md-6 col-xs-12">
                <div class="research">
                    <h2 class="research-title">Finding better learning algorithms for self-driving cars</h2>
                    <div class="research-content">
                        <div class="research-authors">
                            <p class="text-2">{{__('Authors')}}</p>
                            <ul>
                                <li>Jihene Rezgui</li>
                                <li>Clément Bisaillon</li>
                                <li>Léonard Oest O'Leary</li>
                            </ul>
                        </div>
                        <div class="research-abstract">
                            <p class="text-2">{{__('Abstract')}}</p>
                            <show-more text="Cars are becoming more and more intelligent, embedded with a range of sensors to give them local perception of their environment (LIDARs, cameras, etc.). Trendy companies like Google and Tesla are actively testing cars on American roads that can drive without any human interaction [1]. Neural networks are the modern approach for autonomous cars. However, an inefficient neural network algorithm will make the learning process slower and will result in a less reliable autonomous vehicle. In this paper, we will introduce a platform built in JAVA named LAOP (Learning Algorithm Optimization Platform) [2] while explaining the solutions we found to make it easy for researchers to test and compare their own algorithms. Then, we will show how we have integrated a natural selection algorithm with a neural network in order to improve them. Moreover, we will demonstrate how the Fully Connected Neural Network and the NEAT [3] (NeuroEvolution of Augmenting Topologies) algorithms are implemented in the context of vehicular learning on LAOP. Finally, we will display the different results extracted from LAOP by tuning several various parameters such as the weight mutation chance and the car density in the simulation."></show-more>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-md-6 col-xs-12">
                <div class="research">
                    <h2 class="research-title">Training Genetic Neural Networks Algorithms for Autonomous Cars with the LAOP Platform</h2>
                    <div class="research-content">
                        <div class="research-authors">
                            <p class="text-2">{{__('Authors')}}</p>
                            <ul>
                                <li>Jihene Rezgui</li>
                                <li>Léonard Oest O'Leary</li>
                                <li>Clément Bisaillon</li>
                                <li>Lamia Chaari Fourati</li>
                            </ul>
                        </div>
                        <div class="research-abstract">
                            <p class="text-2">{{__('Abstract')}}</p>
                            <show-more text="The challenge with self-driving cars is to create a model that converts sensors data (such as cameras or proximity sensors) into actions. This way the car can react to its changing environment and make the right decisions. In the literature, Neural Networks is the most promising technique used to parse these sensors data. A well trained and designed neural network can take the sensors values and output the right actions. In this paper, we introduce a Way to train Efficiently Neural Network with Genetic principle, called WENNG. Moreover, we propose a comparative study between all the variations of WENNG to highlight the best-performing ones. To evaluate our WENNG training variation, we implement two well known neural network algorithms: the FullyConnected one and the NEAT algorithm. Through extensive simulations, we demonstrate that the Natural Selection WENNG outperforms the Greedy WENNG at training the genetic neural networks with a low mutation rate. Finally, we show that an IMproved version of NEAT called IMNEAT, minimizes twice the number of generations to reach the maximum fitness value compared to the traditional NEAT algorithm."></show-more>
                        </div>
                    </div>

                </div>
        </div>
    </div>
@endsection