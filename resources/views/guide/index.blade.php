@extends('layouts.app')
@section('title', 'Usage guide')

@section('content')
    <h1>Guides</h1>
    <p>{{__('This guide shows how to have a running version of LAOP and how to export the algorithms your created on it.')}}</p>
    <hr>
    <h2>{{__('Installing LAOP')}}</h2>
    <div class="guide_subsection">
        <div class="guide_prerequisite">
            <h3>{{__('Prerequisites')}}</h3>
            <ul>
                <li>Maven</li>
                <li>JDK >= 1.8</li>
            </ul>
        </div>
        <div class="guide_steps">
            <h3>{{__('Installation steps')}}</h3>
            <ol>
                <li>
                    <p>Install the LAOP from Git</p>
                    <p class="console_text">> git clone https://github.com/lool01/LAOP_alpha.git</p>
                </li>
                <li>
                    <p>Install the dependencies using Maven</p>
                    <p class="console_text">> cd LAOP_alpha<br>> mvn install</p>
                </li>
                <li>
                    <p>Run the graphical interface by running the main method of <b>org.lrima.laop.core.LaopGraphical</b></p>
                </li>
            </ol>
        </div>
    </div>
    <hr>
    <h2>{{__('Developing your first algorithm')}}</h2>
    <div class="guide_subsection">
        <div class="guide_prerequisite">
            <h3>{{__('Prerequisites')}}</h3>
            <ul>
                <li>The LAOP source code</li>
            </ul>
        </div>
        <div class="guide_steps">
            <h3>{{__('Development steps')}}</h3>
            <ol>
                <li>
                    <p>Create a class implementing the <b>org.lrima.laop.network.LearningAlgorithm interface</b></p>
                </li>
                <li>
                    <p>Redefine the <b>train</b> method</p>
                    <h4>Example from FUCONN</h4>
                    <pre class="prettyprint">
<code>public void train(Environnement env1, LearningEngine learningEngine) {
    MultiAgentEnvironnement env = (MultiAgentEnvironnement) env1;
    geneticNN = new ArrayList<>();
    for (int i = 0; i < 100; i++) {
        FUCONN e = new FUCONN();
        e.init();
        geneticNN.add(e);
    }
    ArrayList&#60;Agent&#62; agents = env.reset(100);
    while(learningEngine.whileButtonNotPressed()){
        while(!env.isFinished()){
            ArrayList&#60;CarControls&#62; carControls = new ArrayList<>();
            for (int i = 0; i < geneticNN.size(); i++) {
                geneticNN.get(i).setFitness(agents.get(i).getReward());
                double[] sensorValues = agents.get(i).getSensors().stream().mapToDouble(Sensor::getValue).toArray();
                carControls.add(geneticNN.get(i).control(sensorValues));
            }
            agents = env.step(carControls);
            env.render();
        }
        geneticNN = learn(geneticNN);
        learningEngine.evaluate(this);
        agents = env.reset(geneticNN.size());
    }
}</code></pre>
                </li>
                <li>
                    <p>Redefine the <b>test</b> method</p>
                    <h4>Example from FUCONN</h4>
                    <pre class="prettyprint">
<code>public CarControls test(Agent agent) {
    double[] sensorValues = agent.getSensors().stream().mapToDouble(Sensor::getValue).toArray();
    return geneticNN.get(0).control(sensorValues);
}</code></pre>
                </li>
            </ol>
        </div>
    </div>
    <hr>
    <h2>{{__('Exporting your algorithms')}}</h2>
        <div>
            <ol>
                <li>Create a blank class and create a main method in it</li>
                <li>Use the method createJar that is inside org.lrima.laop.plugin.PluginCreator to create the jar. This function takes the following three arguments</li>
                <ul>
                    <li>The relative path of the name of the jar that will be exported</li>
                    <li>The class object of the class that implements the interface LearningAlgorithm.</li>
                    <li>An ArrayList of all the dependencies. Note that another version of LAOP will have all the classes packaged with your installation, you just need to put the classes that you created.</li>
                </ul>
                <li>Execute the main method of the blank class to generate the jar file</li>
                <li>Create an account and upload it to LASP. Note that we will review all jar uploaded before making them public to test if they work well).</li>
                <h3>Example</h3>
                <pre class="prettyprint">
<code>public class BlankClass{
    public static void main(String[] args){
        ArrayList arrayList = new ArrayList();
        //Add the dependencies that the main class of the algorithm uses
        arrayList.add(FUCONN.class);
        try {
            PlugingCreator.createJar("FUCONN.jar", GeneticLearning.class, arrayList);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
}</code></pre>
            </ol>
        </div>
    <hr>
@endsection