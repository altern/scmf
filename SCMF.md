<p align="center">
<h1 style="text-align: center"><img src="http://localhost/scmf/images/SCMF_logo.png" align="top" style="margin: 0px 10px; top: -5px; position: relative"/>SCMF specification</h1>
</p>

##Conventions##

- EBNF (Extended Backus-Naur Form) convention syntax description (plaintext representation) is marked throughout the text of this document with green color: 

	<pre class="ebnf"><code>VersionCompound ::= "x" | VersionNumber</code></pre>
- EBNF (Extended Backus-Naur Form) convention syntax description (visual representation) is represented in following form:
<p align="center">
![](http://localhost/scmf/images/SCMF_01.png)
- **[Version](#version) examples** are marked throughout the text of this document with blue color: 
	<span class="version">1.x.x</span>, 
	<span class="version">2.x.0.21</span>,
	<span class="version">2.4.x.10</span>,
	<span class="version">2.0.3.8</span>, ...

- **[Version template](#version_template) element** examples are marked throughout the text of this document with pink color: 
	<span class="version_template_element">x</span>,
	<span class="version_template_element">?</span>,
	<span class="version_template_element">N</span>,
	<span class="version_template_element">M</span>,
	<span class="version_template_element">K</span>,
	<span class="version_template_element">L</span>, ...

- **[Version template](#version_template) examples** are marked throughout the text of this document with grey color: 
	<span class="version_template">N.?.?.L</span>, <span class="version_template">2.x.?.L</span>, <span class="version_template">3.0.K</span>, ...

Combination of *version examples* and *version template elements* usually forms *version template example*. For example, [versions](#version) <span class="version">2.x.0.21</span>, <span class="version">2.4.x.10</span> and <span class="version">2.0.3.8</span> can be referenced by following *version template examples*: <span class="version_template">N.?.?.L</span> and <span class="version_template">2.?.?.L</span>.


##Definitions##
- <a id="scmf">**SCMF**</a> (Software Configuration Management Framework) – list of conventions and best practices used for the effective Software Configuration Management activities (version control, deployment management, build management, continuous integration, dependency management, branches management, merge management, release management) organization and its effective maintenance/support. 

- <a id="version">**Version**</a> – special type of marker used for the purpose of distinguishing between different kinds of artifacts which have been produced/created at one of the _SDLC stages_. Usually consists of leading version number, trailing version number and one (or two, in the case of integration artifact version) version compounds separated by the period:
	<pre class="ebnf"><code>Version ::= VersionNumber "." VersionCompound "."VersionCompound ("."VersionNumber )?</code></pre>
<p align="center">
![](http://localhost/scmf/images/SCMF_02.png)
	- <a id="version_compound">**Version compound**</a> – part of [version](#version), separated from other version compounds with the period (“<span class="version_template_element">.</span>” symbol). *Version compound* value is either [version number placeholder](#version_number_placeholder) or [version number](#version_number):

		<pre class="ebnf"><code>VersionCompound::= "x" | VersionNumber</code></pre>
	Version compound is usually represented by question mark (“<span class="version_template_element">?</span>” symbol) as a part of a [version template](#version_template). Example: <span class="version_template">N.?.?.L</span>.
		- <a id="version_number_placeholder">**Version number placeholder**</a>– "<span class="version_template_element">x</span>" symbol used as a placeholder for [version number](#version_number) value. It is used instead of actual [version number](#version_number) in the case when numbering is not applicable to the current context. For example, [support branch version](#support_branch_version) can have value <span class="version">1.x.x</span>. "<span class="version_template_element">x</span>" symbols show that [release version number](#release_version_number) and [build version number](#build_version_number) are not applicable to the context of [support branch](#support_branch) versioning (because there are no corresponding versioned [release artifact](#release_artifact) and [build artifact](#build_artifact)). Thus, initial [mainline](#mainline) state can be marked with <span class="version">x.x.x</span> version as long as numbering is not applicable to the initial [mainline](#mainline) context at all (there are no [versioned artifacts](#versioned_artifact) which correspond to the [major version number](#major_version_number), [release version number](#release_version_number) and [build version number](#build_version_number)).
		- <a id="version_number">**Version number**</a> – integer used for incremental version numbering; it is a numeric representation of corresponding [SDLC iteration](#sdlc_iteration); also it represents successive instance of some [versioned artifact](#versioned_artifact). It usually starts from 0 (even in case of [major version number](#major_version_number)). Version number is usually represented as a part of a [version template](#version_template) using one of the following symbols: ‘<span class="version_template_element">N</span>’, ‘<span class="version_template_element">M</span>’, ‘<span class="version_template_element">K</span>’, ‘<span class="version_template_element">L</span>’. Usage of specific letter depends on the context. Example: <span class="version_template">N.M.K.L</span>.
			- <a id="major_version_number">**Major version number**</a> – integer used for incremental version numbering of [support branches](#support_branch). *Major version* corresponds to the most long-lasting [SDLC iteration](#sdlc_iteration) ([major version development](#major_version_development)) – starting from the <span class="sdlc_phase">requirements development and management</span> phase, ending with the <span class="sdlc_phase">maintenance & support phase</span>. Major version number is usually represented as a part of a [version template](#version_template) using symbol ‘<span class="version_template_element">N</span>’: 
			<p align="center">
			![](http://localhost/scmf/images/SCMF_03.png)
			- <a id="release_version_number">**Release version number**</a> – integer used for incremental version numbering of [release branches](#release_branch) using [major inheritance scope](#major_inheritance_scope). Release version corresponds to [SDLC iteration](#sdlc_iteration) ([release version development](#release_version_development)) starting from the <span class="sdlc_phase">requirements development and management</span> phase, ending with the <span class="sdlc_phase">maintenance & support</span> phase, omitting <span class="sdlc_phase">design</span> phase (sometimes it might be reduced to “<span class="sdlc_phase">implementation</span> → <span class="sdlc_phase">deployment</span>” [SDLC iteration](#sdlc_iteration)). Release version number is usually represented as a part of a [version template](#version_template) using symbol ‘<span class="version_template_element">M</span>’:
			<p align="center">
			![](http://localhost/scmf/images/SCMF_04.png)
			<p align="center">
			![](http://localhost/scmf/images/SCMF_05.png)
			
			- <a id="build_version_number">**Build version number**</a> – integer used for incremental version numbering of [build artifacts](#build_artifact) (using [precursory inheritance scope](#precursory_inheritance_scope)) or [release artifacts](#release_artifact) (using [release inheritance scope](#release_inheritance_scope)). *Build version* corresponds to [SDLC iteration](#sdlc_iteration) starting from the <span class="sdlc_phase">implementation</span> phase, ending with <span class="sdlc_phase">testing</span> phase. *Build version number* is usually represented as a part of a [version template](#version_template) using symbol ‘<span class="version_template_element">K</span>’:
			<p align="center">
			![](http://localhost/scmf/images/SCMF_06.png)
			
			- <a id="integration_version_number">**Integration version number**</a> – integer used for incremental version numbering of [integration artifacts](#integration_artifact) using [integration scope](#integration_scope). *Integration version* corresponds to [SDLC iteration](#sdlc_iteration) starting from the <span class="sdlc_phase">implementation</span> phase, ending with <span class="sdlc_phase">integration</span> phase. *Integration version number* is usually represented as a part of a [version template](#version_template) using symbol ‘<span class="version_template_element">L</span>’:
			<p align="center">
			![](http://localhost/scmf/images/SCMF_07.png)

	- <a id="artifact_version">**Artifact version**</a> – [Version](#version) of [artifact](#artifact) (result of the build process) produced as a result of one of [SDLC stages](#sdlc_stage). Has one of the following [version templates](#version_template): <span class="version_template">N.?.K</span> or <span class="version_template">N.?.?.L</span>. 
		- <a id="build_release_artifact_version">**Build/release artifact version**</a> – [artifact](#artifact) having following [version template](#version_template): <span class="version_template">N.?.K</span>.
			- <a id="build_artifact_version">**Build artifact version**</a> – version of [build artifact](#build_artifact) corresponding to the following [version template](#version_template): <span class="version_template">N.x.K</span>
			- <a id="build_artifact_version">**Release artifact version**</a> – version of [release artifact](#release_artifact) corresponding to the following [version template](#version_template): <span class="version_template">N.M.K</span>
			<p align="center">
			![](http://localhost/scmf/images/SCMF_08.png)
		- <a id="integration_artifact_version">**Integration artifact version**</a> – version of [integration artifact](#integration_artifact) corresponding to following [version template](#version_template): <span class="version_template">N.?.?.L</span>.
			- <a id="pilot_integration_artifact_version">**Pilot integration artifact version**</a> – version of [integration artifact](#integration_artifact) corresponding to following [version template](#version_template): <span class="version_template">N.x.x.L</span>.
			- <a id="development_integration_artifact_version">**Development integration artifact version**</a> – version of [integration artifact](#integration_artifact) corresponding to following [version template](#version_template): <span class="version_template">N.x.K.L</span>.
			- <a id="pre-release_integration_artifact_version">**Pre-release integration artifact version**</a> – version of [integration artifact](#integration_artifact) corresponding to following [version template](#version_template): <span class="version_template">N.M.x.L</span>.
			- <a id="release_integration_artifact_version">**Release integration artifact version**</a> – version of [integration artifact](#integration_artifact) corresponding to following [version template](#version_template): <span class="version_template">N.M.K.L</span>.
			<p align="center">
			![](http://localhost/scmf/images/SCMF_09.png)
	- <a id="branch_version">**Branch version**</a> – version of repository branch. Could be of two main types: [support branch version](#support_branch_version) and [release branch version](#release_branch_version). Has following [version template](#version_template): <span class="version_template">N.?.x</span>.
		- <a id="support_branch_version">**Support branch version**</a> – branch ([support branch](#support_branch)) having following [version template](#version_template): <span class="version_template">N.x.x</span>. 
		- <a id="release_branch_version">**Release branch version**</a> – branch ([release branch](#release_branch)) having following [version template](#version_template): <span class="version_template">N.M.x</span>. 
	- <a id="starting_version">**Starting version**</a> – [version](#version) used by default for the [mainline](#mainline) [codebase](#codebase) of newly started project/development (new version control repository has been allocated).
	- <a id="inherited_version">**Inherited version**</a> – [version](#version) part, which has been inherited from the parent entity. For example, [release branch version](#release_branch_version) <span class="version">1.0.x</span> inherits its [major version number](#major_version_number) from parent [support branch](#support_branch) <span class="version">1.x.x</span> as long it cannot be created without this parent branch. Another example: [release artifact](#release_artifact) <span class="version">2.3.6</span> inherits [major version number](#major_version_number) (2) and [release version number](#release_version_number) (3) from parent [release branch](#release_branch) <span class="version">2.3.x</span>.
	- <a id="imaginary_version">**Imaginary version**</a> – [version](#version) assigned to the [mainline](#mainline) [codebase](#codebase) depending on the repository state or current [SDLC phase](#sdlc_phase) (see Picture 13 (**TODO**: replace image link), *imaginary versions* are outlined by black dashed rectangles). [Codebase inheritance](#codebase_inheritance) definition section contains corresponding details.
	- <a id="version_template">**Version template**</a> – notation used for referencing version sets (several [versions](#version) at once). For example, versions <span class="version">1.x.x</span>, <span class="version">3.x.x</span> and <span class="version">1.0.x</span> can be referenced at once using version template <span class="version_template">N.?.x</span>.
- <a id="artifact">**Artifact**</a> – result of build process which can be used for subsequent installation/deployment. There could be three main [artifact](#artifact) types: *build artifact*, *release artifact* and *integration artifact*:
	- <a id="build_artifact">**Build artifact**</a> – [artifact](#artifact) produced during [precursory major version development](#precursory_major_version_development) stage.
	- <a id="release_artifact">**Release artifact**</a> – [artifact](#artifact) produced during [release version development](#release_version_development) stage.
	- <a id="integration_artifact">**Integration artifact**</a> – [artifact](#artifact) produced during [integration](#integration) stage.
- <a id="versioned_artifact">**Versioned artifact**</a> – entity stored in version control system (there are two types of such entities: [branches](#branch) and [tags](#tag)) which can be used as a starting point for build process and, therefore, for producing [artifact](#artifact). *Versioned artifact* has the same [version](#version) as the corresponding [artifact](#artifact) (**TODO**: refine definition) it represents.
	- <a id="branch">**Branch**</a> – [versioned artifact](#versioned_artifact) used for the purpose of versioning project source codebase.
		- <a id="mainline">**Mainline**</a> – main [branch](#branch) used for versioning source codebase related to the latest [major version development](#major_version_development) stage. Typical examples of *mainline* branch are **trunk** (for Subversion version control system) and **master** (for Git version control system).
		- <a id="support branch">**Support branch**</a> – [branch](#branch) used for versioning source codebase related to the [major version development](#major_version_development) stage.
		- <a id="release_branch">**Release branch**</a> – [branch](#branch) used for versioning source codebase related to [release version development](#release_version_development) stage.
		- <a id="experimental_branch">**Experimental branch**</a> – [branch](#branch) used for versioning any kind of codebase without regard to any of the [SDLC stages](#sdlc_stages).
	- <a id="tag">**Tag**</a> – [versioned artifact](#versioned_artifact) used for the purpose of snapshotting source codebase used for producing [build/release artifact](#build_release_artifact).
- <a id="version_inheritance_scope">**Version inheritance scope**</a> – specific stream interval (or conjunction of subsequent stream intervals) used as a parent entity for creating child entities and providing corresponding [inherited version](#inherited_version) for child entities. *Version inheritance scope* is closely related to corresponding [SDLC stage](#sdlc_stage). 
	- <a id="major_inheritance_scope">**Major inheritance scope**</a> – [version inheritance scope](#version_inheritance_scope) based on [codebase inheritance](#codebase_inheritance) concept. It consists of stream intervals involved into [major version development](#major_version_development) including [release branches](#release_branch) (see picture below; *major inheritance scope* is marked with black dashed line):
	<p align="center">
	![](http://localhost/scmf/images/SCMF_10.png)
	- <a id="precursory_inheritance_scope">**Precursory inheritance scope**</a> – [version inheritance scope](#version_inheritance_scope), based on [codebase inheritance](#codebase_inheritance) concept. It consists of stream intervals involved into [major version development](#major_version_development) used for producing [build artifacts](#build_artifact) (see picture below; *precursory inheritance scope* is marked with black dashed line):
	<p align="center">
	![](http://localhost/scmf/images/SCMF_11.png)
	- <a id="release_inheritance_scope">**Release inheritance scope**</a> – [version inheritance scope](#version_inheritance_scope) consisting of stream interval involved into [release version development](#release_version_development) used for producing [release artifacts](#release_artifact). Unlike [major inheritance scope](#major_inheritance_scope) or [precursory inheritance scope](#precursory_inheritance_scope), stream interval for *release inheritance scope* corresponds to one whole *release branch* ([major](#major_inheritance_scope) and [precursory inheritance scope](#precursory_inheritance_scope) correspond to several subsequent stream intervals and different branches. See picture below; *major inheritance scope* is marked with black dashed line:
	<p align="center">
	![](http://localhost/scmf/images/SCMF_12.png)
	- <a id="integration_inheritance_scope">**Integration inheritance scope**</a> – [version inheritance scope](#version_inheritance_scope) of the stage lasting from the moment of previous [build/release artifact](#build_release_artifact) delivery to the next [build/release artifact](#build_release_artifact) (see picture below; *integration inheritance scopes* are marked with dashed red outlines):
	<p align="center">
	![](http://localhost/scmf/images/SCMF_13.png)