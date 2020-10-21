<template>
    <div class="pt-5 px-5">
        <div class="repository-info container-lg clearfix bg-secondary border mx-auto py-4">
            <div class="col-12 name">
                <div class="mb-4">
                    <strong>
                        {{ repoOwner }}/{{ repoName }}
                    </strong>
                </div>
            </div>
            <div class="col-lg-4 col-6 sm-offset-3 mb-3 float-left">
                <img :src="issuesImg" alt="Issues" class="w-inherit"/>
                <div class="contribution tooltipped tooltipped-s" aria-label="Issues">
                    {{ issues.length }}
                </div>
            </div>
            <div class="col-lg-4 col-6 sm-offset-3 float-left">
                <img :src="pullRequestsImg" alt="PullRequests" class="w-inherit"/>
                <div class="contribution tooltipped tooltipped-s" aria-label="Pull Requests">
                    11
                </div>
            </div>
            <div class="col-lg-4 col-6 sm-offset-3 float-left">
                <img :src="commitsImg" alt="Commits" class="w-inherit pt-2"/>
                <div class="contribution tooltipped tooltipped-s" aria-label="Commits">
                    200
                </div>
            </div>
            <div class="col-12 float-left">
                <div class="my-4">
                    <strong>
                        Colaboradores
                    </strong>
                    <div class="col-12">
                        <a 
                            v-for="contributor in contributors" :key="contributor.id"
                            :href="contributor.html_url" target="_blank" rel="noopener noreferrer"
                            class="tooltipped tooltipped-n" :aria-label="contributor.login"
                        >
                            <img :src="contributor.avatar_url" alt="Avatar" class="avatar avatar-8 mx-1"/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 float-left post-scriptum">
                <small>
                    Contribuições relativas ao período de 01/10/2020
                    à 31/10/2020
                </small>
            </div>
        </div>
    <TheFooter/>
    </div>

</template>

<script>
export default {
    name: 'ShowRepository',
    data(){
        return {
            repoName: String,
            repoOwner: String,
            issuesImg: require('@/assets/images/issues.png'),
            pullRequestsImg: require('@/assets/images/pull-request.png'),
            commitsImg: require('@/assets/images/commit.png'),
            issues: Object,
            contributors: {}
        }
    },

    methods: {
        getOctoberIssues(issues, currentYear) {
            this.issues = issues.data.filter(i => {
                return Date(i.created_at) >= Date(`${currentYear}-10-01`) &&
                       Date(i.created_at) <= Date(`${currentYear}-10-31`);
            });
        },

        getContributors(){
            this.issues.forEach(issue => {
                console.log(issue);
                this.contributors[issue.user.id] = issue.user;
            });
        }
    },

    mounted(){
        this.repoName = this.$route.params.name;
        this.repoOwner = this.$route.params.owner;
        this.getOctoberIssues(this.$route.params.issues, this.$route.params.currentYear);
        this.getContributors();
    }
}
</script>

<style>

    .repository-info {
        min-height: 90vh;
        font-size: 2rem;
    }

    .w-inherit {
        width: inherit !important;
    }

    @media (max-width: 360px) {
        .sm-offset-3 {
            margin-left: 25% !important;
        }
    }

    .post-scriptum {
        font-size: 0.8rem;
    }

    .avatar {
        border-radius: 2rem;
    }
</style>