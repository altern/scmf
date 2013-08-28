<p align="center">
<h1>SCMF specification</h1>
</p>

#1. Glossary #
##Conventions##

- EBNF (Extended Backus-Naur Form) convention syntax description (plaintext representation) is marked throughout the text of this document with green color: 

	<pre class="ebnf"><code>VersionCompound ::= "x" | VersionNumber</code></pre>
- EBNF (Extended Backus-Naur Form) convention syntax description (visual representation) is represented in following form:

<p align="center">
![](http://localhost/scmf/images/SCMF_01.png)

- *[Version template](#version_template) examples* are marked throughout the text of this document with grey color: 
	
	<pre class="version_template_example"><code>N.?.?.L</code></pre>

- *[Version template](#version_template) element* examples are marked throughout the text of this document with pink color: 

	<pre class="version_template_element"><code>?</code></pre>
- <a id="version_template">**Version templates**</a> are marked throughout the text of this document with blue color: 

	<pre class="version_template"><code>1.x.x</code></pre>
##Definitions##
- <a id="scmf">**SCMF**</a> (Software Configuration Management Framework) – list of conventions and best practices used for the effective Software Configuration Management activities (version control, deployment management, build management, continuous integration, dependency management, branches management, merge management, release management) organization and its effective maintenance/support. 
- <a id="version">**Version**</a> – special type of marker used for the purpose of distinguishing between different kinds of artifacts which have been produced/created at one of the _SDLC stages_. Usually consists of leading version number, trailing version number and one (or two, in the case of integration artifact version) version compounds separated by the period:
	<pre class="ebnf"><code>Version ::= VersionNumber "." VersionCompound "."VersionCompound ("."VersionNumber )?</code></pre>

<p align="center">
![](http://localhost/scmf/images/SCMF_02.png)

- <a id="version_compound">**Version compound**</a> – part of [version](#version), separated from other version compounds with the period (“<span class="version_template_element">.</span>” symbol). Version compound value is either [version number placeholder](#version_number_placeholder) or [version number](#version_number):

	<pre class="ebnf"><code>VersionCompound::= "x" | VersionNumber</code></pre>
Version compound is usually represented by question mark (“<span class="version_template_element">?</span>” symbol) as a part of a [version template](#version_template). Example: <span class="version_template_example">N.?.?.L</span>.
- <a id="version_number_placeholder">**Version number placeholder**</a>– "<span class="version_template_element">x</span>" symbol used as a placeholder for [version number](#version_number) value. It is used instead of actual [version number](#version_number) in the case when numbering is not applicable to the current context. For example, [support branch version](#support_branch_version) can have value <span class="version_template">1.x.x</span>. "<span class="version_template_element">x</span>" symbols show that [release version number](#release_version_number) and [build version number](#build_version_number) are not applicable to the context of [support branch](#support_branch) versioning (because there are no corresponding versioned [release artifact](#release_artifact) and [build artifact](#build_artifact)). Thus, initial [mainline](#mainline) state can be marked with <span class="version_template">x.x.x</span> version as long as numbering is not applicable to the initial [mainline](#mainline) context at all (there are no [versioned artifacts](#versioned_artifact) which correspond to the [major version number](#major_version_number), [release version number](#release_version_number) and [build version number](#build_version_number)).
- <a id="version_number">**Version number**</a> – integer used for incremental version numbering; it is a numeric representation of corresponding [SDLC iteration](#sdlc_iteration); also it represents successive instance of some [versioned artifact](#versioned_artifact). It usually starts from 0 (even in case of [major version number](#major_version_number), see paragraph 3). Version number is usually represented as a part of a version template using one of the following symbols: ‘<span class="version_template_element">N</span>’, ‘<span class="version_template_element">M</span>’, ‘<span class="version_template_element">K</span>’, ‘<span class="version_template_element">L</span>’. Usage of specific letter depends on the context. Example: <span class="version_template_example">N.M.K.L</span>.
- <a id="major_version_number">**Major version number**</a> – integer used for incremental version numbering of [support branches](#support_branch). *Major version* corresponds to the most long-lasting [SDLC iteration](#sdlc_iteration) ([major version development](#major_version_development)) – starting from the <span class="sdlc_phase">requirements analysis and management</span> phase, ending with the <span class="sdlc_phase">maintenance & support phase</span>. Major version number is usually represented as a part of a [version template](#version_template) using symbol ‘<span class="version_template_element">N</span>’: 
<p align="center">
![](http://localhost/scmf/images/SCMF_03.png)

- <a id="release_version_number">**Release version number**</a> – integer used for incremental version numbering of [release branches](#release_branch) using [major inheritance scope](#major_inheritance_scope). Release version corresponds to [SDLC iteration](#sdlc_iteration) ([release version development](#release_version_development)) starting from the <span class="sdlc_phase">requirements analysis and management</span> phase, ending with the <span class="sdlc_phase">maintenance & support</span> phase, omitting <span class="sdlc_phase">design</span> phase (sometimes it might be reduced to “<span class="sdlc_phase">implementation</span> → <span class="sdlc_phase">deployment</span>” [SDLC iteration](#sdlc_iteration)). Release version number is usually represented as a part of a [version template](#version_template) using symbol ‘<span class="version_template_element">M</span>’:
<p align="center">
![](http://localhost/scmf/images/SCMF_04.png)
<p align="center">
![](http://localhost/scmf/images/SCMF_05.png)