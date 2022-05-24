<template>
  <div class="p-4">
    <NuxtLink class="bot-button" to="/_dev">Development Resources</NuxtLink>
    <div class="pt-4">
      <h1 class="text-2xl">Database Design</h1>
      <h2 class="text-xl">Schema</h2>
      <ul>
        <li class="dev-db-table">Events:</li>
        <ul>
          <li class="pl-4">
            <span class="dev-db-section">description</span>: It holds static
            information about the events and all related information - both XC
            and TRACK.
          </li>
          <li class="pl-4">
            <span class="dev-db-section">attributes</span>:
            <ul>
              <li class="pl-8">
                - <span class="dev-db-attr">sport</span>: (Sport enum->name)
                TRACK or XC.
              </li>
              <li class="pl-8">
                - <span class="dev-db-attr">gender</span>: (Gender enum->name)
                MALE or FEMALE or MIXED.
              </li>
              <li class="pl-8">
                - <span class="dev-db-attr">mark_type</span>: (MarkType
                enum->name) TIME or DISTANCE or SCORE.
              </li>
              <li class="pl-8">
                - <span class="dev-db-attr">multiple booleans...</span>: Several
                booleans (to allow simple filtering of events)
              </li>
            </ul>
          </li>
        </ul>
        <li class="dev-db-table">Meets:</li>
        <ul>
          <li class="pl-4">
            <span class="dev-db-section">description</span>: It holds
            information about the meets that are either track (TRACK) or cross
            country (XC).
          </li>
          <li class="pl-4">
            <span class="dev-db-section">attributes</span>:
            <ul>
              <li class="pl-8">
                - <span class="dev-db-attr">sport</span>: (Sport enum->name)
                TRACK or XC.
              </li>
              <li class="pl-8">- <span class="dev-db-attr">name</span></li>
              <li class="pl-8">
                - <span class="dev-db-attr">information</span>
              </li>
              <li class="pl-8">
                - <span class="dev-db-attr">is_indoor</span>: Is the meet held
                indoors? Default is outdoors.
              </li>
              <li class="pl-8">
                -
                <span class="dev-db-attr">is_sanctioned</span>: Is the meet
                sactioned by an outside governing body?
              </li>
            </ul>
          </li>
          <li class="pl-4">
            <span class="dev-db-section">relationships</span>:
            <ul>
              <li class="pl-8">
                - <span class="dev-db-attr">organization</span>: A meet belongs
                to a organization. This is who created and hosts the meet.
              </li>
            </ul>
          </li>
        </ul>
        <li class="dev-db-table">Organizations:</li>
        <ul>
          <li class="pl-4">
            <span class="dev-db-section">description</span>: It holds
            information about the organization.
          </li>
          <li class="pl-4">
            <span class="dev-db-section">attributes</span>:
            <ul>
              <li class="pl-8">
                - <span class="dev-db-attr">sport</span>: (Sport enum->name)
                TRACK or XC.
              </li>
              <li class="pl-8">
                - <span class="dev-db-attr">organization_type</span>:
                (OrganizationType enum->name) HIGH_SCHOOL or JUNIOR_HIGH etc.
              </li>
              <li class="pl-8">- <span class="dev-db-attr">name</span></li>
              <li class="pl-8">
                - <span class="dev-db-attr">abbr</span>: A unique abbreviation
                used in most places to idenfity the organization.
              </li>
            </ul>
          </li>
        </ul>
      </ul>
    </div>
  </div>
</template>
